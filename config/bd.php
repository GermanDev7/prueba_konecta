<?php
$host="localhost";
$bd="cafeteria";
$usuario="root";
$pass="";
$opciones=[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION];
try {
    $conexion= new PDO("mysql:host=$host;dbname=$bd",$usuario,$pass);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if($conexion)
    {


    }
    
} catch (PDOException $ex) {

    echo $ex->getMessage();
    
}
 ?>