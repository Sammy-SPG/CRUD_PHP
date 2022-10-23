<?php

require("./connection.php");

if(isset($_POST['ID']) && isset($_POST['CLIENTE'])){
    $ID = $_POST['ID'];
    $CLIENTE = $_POST['CLIENTE'];
    $queryUpdateInventario = "UPDATE inventario INNER JOIN pedidos ON inventario.ID_PRODUCTO = $ID AND pedidos.ID_PRODUCTO = $ID SET inventario.CANTIDAD = inventario.CANTIDAD + pedidos.CANTIDAD";
    $query = "DELETE FROM pedidos WHERE ID_PRODUCTO = $ID AND CLIENTE = '$CLIENTE'";
    if($result = mysqli_query($connection, $queryUpdateInventario)) echo json_encode(['result' => mysqli_query($connection, $query)]);
    else echo json_encode(['error' => ['message' => "No se optienen los datos"]]);
}

?>