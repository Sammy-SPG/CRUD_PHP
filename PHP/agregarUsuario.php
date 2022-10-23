<?php

require ("./connection.php");

if(isset($_POST['NOMBRE']) && isset($_POST['PASSWORD'])){
    $NOMBRE = $_POST['NOMBRE'];
    $PASSWORD = $_POST['PASSWORD'];
    $query = "INSERT INTO empleado (ID_EMPLEADO, NOMBRE, PASSWORD) VALUES ('', '$NOMBRE', '$PASSWORD')";
    echo json_encode(['result'=> ['success' => mysqli_query($connection, $query)]]);
}else{
    echo json_encode(['result'=> ['error' => true]]);
}

?>