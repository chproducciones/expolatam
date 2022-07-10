<?php

include '../db/conexion.php';
//header("Content-Type: text/javascript; charset=utf-8");

$query2= "SELECT * from fair_titles";
//echo $query2;
$conexion= Database::connect();
if($conexion!=null){
    $conectar= $conexion->prepare($query2);
    $conectar->execute();
    $respuesta = json_encode( $conectar->fetchAll(PDO::FETCH_ASSOC));
    echo $respuesta;
}


?>