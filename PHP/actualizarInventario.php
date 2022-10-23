<?php

require("./connection.php");

if(isset($_POST['CANTIDAD']) && isset($_POST['FECHA']) && isset($_POST['ID'])){
    $cantidad = $_POST['CANTIDAD'];
    $fecha = $_POST['FECHA'];
    $ID = $_POST['ID'];
    $query = "UPDATE inventario SET CANTIDAD = $cantidad, FECHA ='$fecha' WHERE ID_PRODUCTO = $ID";
    echo json_encode(['result' => mysqli_query($connection, $query)]);
}else{
    echo json_encode(['err' => ['message' => 'Datos no optenidos']]);
}

?>