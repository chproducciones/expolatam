<?php

include '../db/conexion.php';

/*$nombre=$_POST['nombre'];
$email=$_POST['email'];
$message=$_POST['message'];*/

//$resultado = $_POST['email']+" "+$_POST['nombre'];
//$respuesta= $nombre+" "+ $email;

try{
    $conexion= Database::connect();
    $query = "INSERT into contact_forms(name,email,message)values(?,?,?)";

    $conexion->prepare($query)->execute(
        array($_POST['nombre'], $_POST['email'],$_POST['message'])
    );
    
    echo "Éxito";
}catch(Exception $e){
    echo $e;
}





?>