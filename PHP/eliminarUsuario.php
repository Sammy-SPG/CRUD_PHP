<?php

require ('./connection.php');

if(isset($_POST['ID'])){
    $query = "DELETE FROM empleado WHERE ID_EMPLEADO = ".$_POST['ID']."";
    echo json_encode(['result'=> ['success' => mysqli_query($connection, $query)]]);
}else{
    echo json_encode(['result'=> ['error' => true]]);
}

?>