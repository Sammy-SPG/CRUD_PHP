<?php

require("./connection.php");

$query = "SELECT * FROM producto";
$item = array();
$data = array();
$j = 0;
if($result = mysqli_query($connection, $query)){
    while($row = mysqli_fetch_array($result)){
        for($i = 0; $i < 3; $i++){
            $item[$i] = $row[$i];
        }
        $data[$j] = $item;
        $j++;
    }
    echo json_encode($data);
}
