<?php

function getConexion() {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "BrainWave";

    // Conexión a la base de datos
    $conexion = mysqli_connect($servername, $username, $password, $dbname) or die("Error de conexión a la base de datos");
if($conexion){
    echo "Conexión exitosa";
}
else{
    echo "Error en la conexión";
}
    $query = "SHOW DATABASES LIKE '$dbname'";
    $res = mysqli_query($conexion, $query);

    // Si la base de datos existe, seleccionarla
    if(mysqli_num_rows($res) > 0) {
        mysqli_select_db($conexion, $dbname) or die("No se pudo seleccionar la base de datos Ambulatorio");
    }

    // Conexión a la base de datos 'BrainWave'
    $conexion->select_db($dbname);

    // Devolver la conexión establecida
    return $conexion;

}


?>