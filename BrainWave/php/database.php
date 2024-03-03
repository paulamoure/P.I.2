<?php
// Datos de conexión a la base de datos
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'brainwave';

// Crear conexión
$conn = new mysqli( $servername, $username, $password, $database );

// Verificar la conexión
if ( $conn->connect_error ) {
    die( 'Error de conexión: ' . $conn->connect_error );
} else {
    echo 'Conexión exitosa a la base de datos!<br>';
}

// Crear tablas si no existen
$sql = "
CREATE TABLE IF NOT EXISTS perfiles_personas (
    id_paciente INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255),
    apellidos VARCHAR(255),
    email VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS login (
    id_login INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255),
    password VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS pacientes_login (
    id_relacion INT PRIMARY KEY AUTO_INCREMENT,
    id_paciente INT,
    id_login INT,
    FOREIGN KEY (id_paciente) REFERENCES perfiles_personas(id_paciente),
    FOREIGN KEY (id_login) REFERENCES login(id_login)
);

CREATE TABLE IF NOT EXISTS datos_psicologos (
    id_psicologo INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255),
    apellidos VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS contactos (
    id_contacto INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255),
    email VARCHAR(255),
    asunto VARCHAR(255),
    mensaje TEXT,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS psicologos_pacientes (
    id_relacion INT PRIMARY KEY AUTO_INCREMENT,
    id_psicologo INT,
    id_paciente INT,
    FOREIGN KEY (id_psicologo) REFERENCES datos_psicologos(id_psicologo),
    FOREIGN KEY (id_paciente) REFERENCES perfiles_personas(id_paciente)
);

CREATE TABLE IF NOT EXISTS administradores (
    id_admin INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255),
    apellidos VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS eventos_talleres (
    id_evento INT PRIMARY KEY AUTO_INCREMENT,
    nombre_evento VARCHAR(255),
    fecha DATE
);

CREATE TABLE IF NOT EXISTS eventos_pacientes (
    id_relacion INT PRIMARY KEY AUTO_INCREMENT,
    id_evento INT,
    id_paciente INT,
    FOREIGN KEY (id_evento) REFERENCES eventos_talleres(id_evento),
    FOREIGN KEY (id_paciente) REFERENCES perfiles_personas(id_paciente)
);

INSERT INTO login (username, password) VALUES ('Paula', 'Paula123');
INSERT INTO login (username, password) VALUES ('Miguel', 'Maiky123');
";

// Ejecutar consultas
if ( $conn->multi_query( $sql ) === TRUE ) {
    echo "Tablas creadas correctamente y datos iniciales insertados en la tabla 'login'.<br>";
} else {
    echo 'Error al crear las tablas: ' . $conn->error . '<br>';
}

// Establecer el juego de caracteres a UTF-8 ( opcional )
$conn->set_charset( 'utf8' );

// Devolver la conexión
return $conn;
?>