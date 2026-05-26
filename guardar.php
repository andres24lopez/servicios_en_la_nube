<?php

include("conexion.php");

$nombre = $_POST['nombre'];
$edad = $_POST['edad'];
$telefono = $_POST['telefono'];

$sql = "INSERT INTO pacientes(nombre, edad, telefono)
VALUES('$nombre','$edad','$telefono')";

pg_query($conexion, $sql);

header("Location:index.php");

?>
