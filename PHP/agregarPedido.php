<?php

require ('./connection.php');

if(isset($_POST['ID']) && isset($_POST['NOMBRE']) && isset($_POST['CANTIDAD']) && isset($_POST['CLIENTE']) && isset($_POST['FECHA'])){
    $ID = $_POST['ID'];
    $NOMBRE = $_POST['NOMBRE'];
    $CANTIDAD = $_POST['CANTIDAD'];
    $CLIENTE = $_POST['CLIENTE'];
    $FECHA = $_POST['FECHA'];

    $query = "INSERT INTO pedidos (ID_PRODUCTO, NOMBRE_PRODUCTO, CANTIDAD, CLIENTE, FECHA) VALUES ('$ID', '$NOMBRE', $CANTIDAD, '$CLIENTE', '$FECHA')";
    $queryUpdate = "UPDATE inventario INNER JOIN pedidos ON inventario.ID_PRODUCTO = $ID AND pedidos.ID_PRODUCTO = $ID SET inventario.CANTIDAD = inventario.CANTIDAD - pedidos.CANTIDAD WHERE inventario.CANTIDAD > -1";
    if($result = mysqli_query($connection, $query)) echo json_encode(['result'=>['success'=>mysqli_query($connection, $queryUpdate), 'queryInsert'=>$query, 'queryUpdate' => $queryUpdate]]);
    else echo json_encode(['result'=>['error' => $queryUpdate]]);

}else{
    echo json_encode(['error'=>['message'=>'No se optienen los datos']]);
}


?>