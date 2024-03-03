<?php
require_once "tablas.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recibir datos del formulario
    $username = $_POST["username"];
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $email = $_POST["email"];
    $passwd = $_POST["password"];

    

    // Consulta para verificar si el correo electrónico ya existe
    $email_check_query = "SELECT * FROM users WHERE email='$email'";

    // Ejecución de la consulta
    $email_check_result = mysqli_query(getConexion(), $email_check_query);

    if ($email_check_result) {
        // Verificar si el correo electrónico ya está en uso
        if (mysqli_num_rows($email_check_result) > 0) {

            $response = array(
                'status' => 'error',
                'message' => 'El correo electrónico ya está en uso.'
            );
            echo json_encode($response);
            
        } else {
            // Hash de la contraseña antes de almacenarla en la base de datos
            $hashed_password = password_hash($passwd, PASSWORD_DEFAULT);

            // Consulta para insertar el nuevo usuario en la tabla de users
            $insert_query = "INSERT INTO users (username,nombre, apellidos, email, password) VALUES ('$username', '$nombre','$apellidos' ,'$email','$hashed_password')";

            // Ejecutar la inserción
            if (mysqli_query(getConexion(), $insert_query)) {
                // Redirección a la página de inicio de sesión
                $response = array(
                    'status' => 'success',
                    'message' => 'Usuario registrado correctamente.'
                );
                echo json_encode($response);
                exit();
            } else {
                // Mensaje de error si falla la inserción
                echo "Error al registrar el usuario: " . mysqli_error(getConexion());
            }
        }
    } else {
        // Mensaje de error si falla la consulta
        echo "Error en la consulta: " . mysqli_error(getConexion());
    }
}
?> 
