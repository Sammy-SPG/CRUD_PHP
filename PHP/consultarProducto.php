<?php
require('./connection.php');
$j = 0;
$producto = array();
$DataProducto = array();
if (isset($_POST['ID_producto'])) {
    $query = "SELECT * FROM producto WHERE ID_PRODUCTO = " . $_POST['ID_producto'] . "";
    if ($result = mysqli_query($connection, $query)) {
        while ($row = mysqli_fetch_array($result)) {
            for ($i = 0; $i < 3; $i++) {
                $producto[$i] = $row[$i];
            }
        }
        echo json_encode(['result' => $producto]);
    } else {
        echo json_encode(['err' => true]);
    }
} else {
    $query = "SELECT ID_PRODUCTO, NOMBRE_PRODUCTO FROM producto";
    if ($result = mysqli_query($connection, $query)) {
        while ($row = mysqli_fetch_array($result)) {
            for ($i = 0; $i < 2; $i++) {
                $producto[$i] = $row[$i];
            }
            $DataProducto[$j] = $producto;
            $j++;
        }
        echo json_encode(['result' => $DataProducto]);
    } else {
        echo json_encode(['err' => true]);
    }
}
