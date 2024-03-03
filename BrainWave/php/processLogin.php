<?php
require_once "conecta.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    // Consulta para buscar al usuario por nombre de usuario
    $query = "SELECT * FROM users WHERE username='$username'";

    // Ejecución de la consulta
    $result = mysqli_query(getConexion(), $query);

    if ($result) {
        // Verificar si se encontraron resultados
        if (mysqli_num_rows($result) > 0) {
            $elemento = mysqli_fetch_assoc($result);
            // Verificar la contraseña hasheada
            if (password_verify($password, $elemento["password"])) {
                // Redirección a la página del usuario con el nombre de usuario como parámetro
                session_start();
                $_SESSION["username"] = $username;
                $response = array(
                    'status' => 'success',
                    'message' => 'Usuario logueado correctamente.',
                    'username' => $username,
                );
                echo json_encode($response);
                exit();
            } else {
               $response = array(
                    'status' => 'error',
                    'message' => 'Contraseña incorrecta.'
                );  
                echo json_encode($response);
            }
        } else {
            $response = array(
                'status' => 'error',
                'message' => 'El usuario no existe.'
            );
            echo json_encode($response);
        }
    } else {
        $response = array(
            'status' => 'error',
            'message' => 'Error en la consulta.'
        );
        echo json_encode($response);
    }
}
?>
