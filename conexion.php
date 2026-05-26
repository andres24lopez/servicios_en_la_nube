<?php

$host = getenv('MYSQLHOST');
$user = getenv('MYSQLUSER');
$password = getenv('MYSQLPASSWORD');
$database = getenv('MYSQLDATABASE');
$port = getenv('MYSQLPORT');

$conexion = new mysqli(
    $host,
    $user,
    $password,
    $database,
    $port
);

if($conexion->connect_error){
    die("Error de conexion");
}

?>