<?php
require_once 'conecta.php';
session_start();

if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {
    if ( isset( $_POST[ 'nombre' ] ) && isset( $_POST[ 'apellidos' ] ) && isset( $_POST[ 'fecha_nacimiento' ] ) && isset( $_POST[ 'correo' ] ) && isset( $_POST[ 'descripcion' ] ) ) {

        $nombre = mysqli_real_escape_string( getConexion(), $_POST[ 'nombre' ] );
        $apellidos = mysqli_real_escape_string( getConexion(), $_POST[ 'apellidos' ] );
        $date_birth = mysqli_real_escape_string( getConexion(), $_POST[ 'fecha_nacimiento' ] );
        $email = mysqli_real_escape_string( getConexion(), $_POST[ 'correo' ] );
        $descrption = mysqli_real_escape_string( getConexion(), $_POST[ 'descripcion' ] );

        $query = "UPDATE users SET 
                  nombre = ?,
                  apellidos = ?,
                  email = ?,
                  date_birth = ?,
                  descrption = ?
                  WHERE username = ?";

        $con = getConexion();

        if ( $con->connect_error ) {
            die( 'Connection failed: ' . $con->connect_error );
        }

        $stmt = mysqli_prepare( $con, $query );
        mysqli_stmt_bind_param( $stmt, 'ssssss', $nombre, $apellidos, $email, $date_birth, $descrption, $_SESSION[ 'username' ] );

        if ( mysqli_stmt_execute( $stmt ) ) {
            $response = array(
                'status' => 'success',
                'message' => 'Datos actualizados correctamente'
            );
            echo json_encode( $response );
        } else {
            $response = array(
                'status' => 'error',
                'message' => 'Error al actualizar los datos. Por favor, inténtalo de nuevo más tarde.'

            );
            echo json_encode( $response );
        }

        mysqli_stmt_close( $stmt );
    } else {
        $response = array(
            'status' => 'error',
            'message' => 'Por favor, completa todos los campos del formulario.'
        );
        echo json_encode( $response );
    }
} else {
    header( 'Location: editUser.php' );
    exit();
}
?>
