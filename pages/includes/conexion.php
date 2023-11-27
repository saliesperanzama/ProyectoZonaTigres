<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zona_tigres";

// Crear conexión
$conexion = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error al conectar: " . $conexion->connect_error);
}
?>