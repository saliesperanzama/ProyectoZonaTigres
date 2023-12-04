<?php 

function conectar()
{
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

    return $conexion;
}

function ejecutar_sql($instruccion)
{
    $conn = conectar();

    // Ejecutar la instrucción SQL
    $resultado = $conn->query($instruccion) or die("Error en: <br>" . $instruccion . "<br><b>" . $conn->error . "</b>");

    // Cerrar la conexión
    $conn->close();

    return $resultado;
}