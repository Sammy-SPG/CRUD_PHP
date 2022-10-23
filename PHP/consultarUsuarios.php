<?php

require('./connection.php');

$usuario = array();
$data = array();
$i = 0;
$query = null;
if(isset($_POST['ID'])){
    $query = "SELECT * FROM empleado WHERE ID_EMPLEADO = ".$_POST['ID']."";
}else if(isset($_POST['NOMBRE'])){
    $nombre = $_POST['NOMBRE'];
    $query = "SELECT * FROM empleado WHERE NOMBRE LIKE '%$nombre%'";
}else{
    $query = "SELECT * FROM empleado";
}
if($result = mysqli_query($connection, $query)){
    while($row = mysqli_fetch_array($result)){
        for($j = 0; $j < 3; $j++){
            $usuario[$j] = $row[$j];
        }
        $data[$i] = $usuario;
        $i++;
    }
    echo json_encode($data);
}

?>