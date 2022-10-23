<?php

require ("./connection.php");

if(isset($_POST['ID']) && isset($_POST['PASSWORD'])){
    $ID = $_POST['ID'];
    $PASSWORD = $_POST['PASSWORD'];
    $query = "UPDATE empleado SET PASSWORD = '$PASSWORD' WHERE ID_EMPLEADO = '$ID'";
    echo json_encode(['result' => ['success' => mysqli_query($connection, $query), 'query' => $query]]);
}else{
    echo json_encode(['error' => ['message' => "No se optienen los datos"]]);
}

?>