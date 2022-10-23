<?php

require ("./connection.php");

if(isset($_POST['ID']) && isset($_POST['CANTIDAD'])){
    $ID = $_POST['ID'];
    $CANTIDAD = $_POST['CANTIDAD'];
    $queryUpdatePedido = "UPDATE pedidos SET CANTIDAD = '$CANTIDAD' WHERE ID_PRODUCTO = '$ID'";
    $queryUpdateInventario = "UPDATE inventario INNER JOIN pedidos ON inventario.ID_PRODUCTO = $ID AND pedidos.ID_PRODUCTO = $ID SET inventario.CANTIDAD = inventario.CANTIDAD - ($CANTIDAD - pedidos.CANTIDAD) WHERE inventario.CANTIDAD > -1";
    if($result = mysqli_query($connection, $queryUpdateInventario)) echo json_encode(['result' => ['success' => mysqli_query($connection, $queryUpdatePedido), 'query' => $queryUpdatePedido]]);
}else{
    echo json_encode(['error' => ['message' => "No se optienen los datos"]]);
}

?>