<?php
try{
    $connection = new mysqli('localhost','root','','inventario');
}catch(Exception $e){
    die('ERROR: '.$e->getMessage());
}
?>