<?php
    require('./connection.php');
    $item = array();
    $data = array();
    $i = 0;
    $query = "SELECT pdt.PRECIO, pdt.NOMBRE_PRODUCTO, invt.CANTIDAD FROM producto pdt INNER JOIN inventario invt ON pdt.ID_PRODUCTO = invt.ID_PRODUCTO";
    if($result = mysqli_query($connection, $query)){
        while($row = mysqli_fetch_array($result)){
            for($j = 0; $j < 3; $j++){
                $item[$j] = $row[$j];
            }
            $data[$i] = $item;
            $i++;
        }
        echo json_encode($data);
    }
?>