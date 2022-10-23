<?php

require("./connection.php");

if(isset($_POST['PRECIO']) && isset($_POST['NOMBRE'])){
    $PRECIO = $_POST['PRECIO'];
    $NOMBRE = $_POST['NOMBRE'];

    $query = "INSERT INTO producto (ID_PRODUCTO,PRECIO, NOMBRE_PRODUCTO) VALUES ('', $PRECIO, '$NOMBRE')";
    echo json_encode(['result' => ['success' => mysqli_query($connection, $query)]]);
}else{
    echo json_encode(["err"=>true]);
}

?>