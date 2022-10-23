<?php

require("./connection.php");
$item = array();
$data = array();
$i = 0;
$query = null;
if (isset($_POST['ID'])) {
    $query = "SELECT * FROM inventario WHERE ID_PRODUCTO = " . $_POST['ID'];
} else {
    $query = "SELECT * FROM inventario";
}

if ($result = mysqli_query($connection, $query)) {
    while ($row = mysqli_fetch_array($result)) {
        for ($j = 0; $j < 5; $j++) {
            $item[$j] = $row[$j];
        }
        $data[$i] = $item;
        $i++;
    }
    echo json_encode($data);
} else {
    echo json_encode("No existe");
}
