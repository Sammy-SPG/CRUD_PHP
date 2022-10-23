<?php
require ('./connection.php');
if (isset($_POST['NOMBRE_PRODUCTO']) && isset($_POST['CANTIDAD_PRODUCTO']) && isset($_POST['FECHA_PRODUCTO'])) {
    $ID = $_POST['ID_PRODUCTO'];
    $NOMBRE = $_POST['NOMBRE_PRODUCTO'];
    $CANTIDAD = $_POST['CANTIDAD_PRODUCTO'];
    $UNIDAD = $_POST['UNIDAD_PRODUCTO'];
    $FECHA = $_POST['FECHA_PRODUCTO'];

    $query = "INSERT INTO inventario (ID_PRODUCTO, NOMBRE, CANTIDAD, UNIDAD, FECHA) VALUES ($ID, '$NOMBRE',$CANTIDAD, '$UNIDAD', '$FECHA')";
    echo json_encode(['result' => ['success' => mysqli_query($connection, $query)]]);
    
}else{
    echo json_encode('No se optienen los datos');
}

?>