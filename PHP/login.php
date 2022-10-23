<?php

require('./connection.php');

if (isset($_POST['USER']) && isset($_POST['PASSWORD'])) {
    $USER = $_POST['USER'];
    $PASSWORD = $_POST['PASSWORD'];
    if ($USER == 'ADMINISTRADOR') {
        $query = "SELECT * FROM administrador WHERE NOMBRE = '$USER' AND PASSWORD = '$PASSWORD'";
        if ($result = mysqli_query($connection, $query)) {
            $row = mysqli_fetch_array($result);
            echo json_encode(array('result' => ['success' => $row > 1, 'user' => 'ADMIN']));
        } else {
            echo json_encode(array('err' => 'Error en consulta'));
        }
    } else {
        $query = "SELECT * FROM empleado WHERE NOMBRE = '$USER' AND PASSWORD = '$PASSWORD'";
        if ($result = mysqli_query($connection, $query)) {
            $row = mysqli_fetch_array($result);
            echo json_encode(array('result' => ['success' => $row > 1, 'user' => 'empleado']));
        } else {
            echo json_encode(array('err' => 'Error en consulta'));
        }
    }
} else {
    echo json_encode(array('err' => 'Datos no optenidos'));
}
