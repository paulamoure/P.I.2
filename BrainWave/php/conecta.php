<?php

function getConexion(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "BrainWave";

    // Intenta establecer la conexión
    $conexion = new mysqli($servername, $username, $password, $dbname);

    // Verifica si hay errores de conexión
    if ($conexion->connect_error) {
        throw new Exception("Error de conexión a la base de datos: " . $conexion->connect_error);
    }

    // Devuelve la conexión establecida
    return $conexion;
}

?>
