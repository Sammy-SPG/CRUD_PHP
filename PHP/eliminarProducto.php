<?php

require("./connection.php");

if(isset($_POST['ID'])){
    $ID = $_POST['ID'];
    $query = "DELETE FROM producto WHERE ID_PRODUCTO = $ID";
    echo json_encode(['result' => mysqli_query($connection, $query)]);
}

?>