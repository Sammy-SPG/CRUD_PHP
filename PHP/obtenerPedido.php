<?php

require('./connection.php');

$usuario = array();
$data = array();
$i = 0;
$query = null;
if(isset($_POST['ID'])){
    $query = "SELECT * FROM pedidos WHERE ID_PRODUCTO = ".$_POST['ID']."";
}else{
    $query = "SELECT * FROM pedidos";
}
if($result = mysqli_query($connection, $query)){
    while($row = mysqli_fetch_array($result)){
        for($j = 0; $j < 5; $j++){
            $usuario[$j] = $row[$j];
        }
        $data[$i] = $usuario;
        $i++;
    }
    echo json_encode($data);
}

?>