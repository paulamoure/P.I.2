<?php
require_once 'conecta.php';
session_start();

// Verificar si el usuario está autenticado
if ( !isset( $_SESSION[ 'username' ] ) ) {
    // Redirigir al usuario a la página de inicio de sesión si no está autenticado
    header( 'Location: login.php' );
    exit();
}

// Obtener el nombre de usuario de la sesión
$username = $_SESSION[ 'username' ];

// Consulta para obtener los datos del usuario
$query = "SELECT * FROM users WHERE username='$username'";

// Ejecutar la consulta
$result = mysqli_query( getConexion(), $query );

// Verificar si se encontraron resultados y mostrar los datos del usuario
if ( $result && mysqli_num_rows( $result ) > 0 ) {
    // Obtener la fila de datos del usuario
    $userData = mysqli_fetch_assoc( $result );
    ?>
    <!DOCTYPE html>
    <html>

    <head>
    <meta charset = 'utf-8' />
    <link rel = 'stylesheet' href = '../css/profileUser.css' />
    </head>

    <body id = 'body'>
    <div class = 'tipo-de-cita'>
    <div class = 'div'>
    <div id = 'edit-form-container' class = 'edit-form-container'>

    <!-- edit user form -->
    <form id = 'edit-user-form' class = 'container2'>
    <h2>Editar Usuario</h2>
    <label for = 'nombre'>Nombre:</label>
    <input type = 'text' id = 'nombre' name = 'nombre' value = "<?php echo $userData['nombre']; ?>"
    required />
    <label for = 'apellidos'>Apellidos:</label>
    <input type = 'text' id = 'apellidos' name = 'apellidos'
    value = "<?php echo $userData['apellidos']; ?>" />
    <label for = 'fecha_nacimiento'>Fecha de Nacimiento:</label>
    <input type = 'date' id = 'fecha_nacimiento' name = 'fecha_nacimiento' required />
    <label for = 'correo'>Correo:</label>
    <input type = 'email' id = 'correo' name = 'correo' value = "<?php echo $userData['email']; ?>"
    required />
    <label  for = 'descripcion'>Descripción:</label>
    <textarea id = 'descripcion' name = 'descripcion'>cuentanos un poco de ti...</textarea>
    <!-- Campos de edición -->
    <div class = 'button-container2'>
    <button  type = 'submit' class = 'save-button'>Guardar</button>
 
    </div>
    </form>
    </div>
    <div class = 'overlap' id = 'overlap'>
    <div class = 'overlap-group'>

    <!-- profile user -->
    <div class = 'container' id = 'profile'>
    <h2>Perfil de Usuario</h2>
    <p><strong>Nombre:</strong>
    <?php echo $userData[ 'nombre' ];
    ?>
    </p>
    <p><strong>Apellidos:</strong>
    <?php echo $userData[ 'apellidos' ];
    ?>
    </p>
    <p><strong>Fecha de Nacimiento: </strong>
    <?php echo $userData[ 'date_birth' ] ? $userData[ 'date_birth' ] : 'dd/mm/aaaa';
    ?>
    </p>
    <p><strong>Correo:</strong>
    <?php echo $userData[ 'email' ];
    ?>
    </p>
    <p><strong>Descripción:</strong>
    <?php echo $userData[ 'descrption' ] ? $userData[ 'descrption' ] : 'cuentanos un poco de ti...';
    ?>

</p>

    <div class = 'button-container'>
    <a class = 'edit-button' id = 'edit-button'>Editar Perfil</a>
    </div>
    </div>
    </div>

    <div class = 'text-wrapper-6'>
    <span>BRAINWAVE</span>
    </div>
    </div>

    <header class = 'header'>
    <div class = 'overlap-5'>
    <div class = 'navbar'>
    <div class = 'nosotros'>NOSOTROS</div>
    <div class = 'recursos'>RECURSOS</div>
    <a href="dashboard.php"> <div class = 'servicios' >SERVICIOS</div></a>
   

    <a href = 'mailto:Email@gmail.com' target = '_blank' rel = 'noopener noreferrer'>
    <div class = 'text-wrapper-5'>Email@gmail.com</div>
    </a>
    </div>
    <div class = 'rounded-logo'><img class = 'IMG' src = '../img/logo-transp.png' /></div>
    </div>

    <footer class = 'footer'>
    <div class = 'overlap-40'>
    <div class = 'rectangle-19'></div>
    <div class = 'misc'></div>
    <div class = 'contacto'>
    <div class = 'subscribe-wrapper'>
    <div class = 'subscribe'>SUBSCRIBE</div>
    </div>
    <div class = 'text-wrapper-20'><img src = '../img/email.png' alt = '' /></div>
    <div class = 'text-wrapper-30'><img src = '../img/location.png' alt = '' /></div>
    </div>
    <div class = 'footer-2'>
    <img class = 'rectangle-20' src = '../img/instagram.png' />
    <img class = 'rectangle-21' src = '../img/Twitter.png' />
    <img class = 'rectangle-22' src = '../img/facebook.png' />
    <div class = 'botn-contacto'>
    <div class = 'contactanos-wrapper'>
    <div class = 'contactanos'>CONTACTANOS</div>
    </div>
    </div>
    <div class = 'redes-sociales'>REDES SOCIALES</div>
    <div class = 'politica-de'>POLITICA DE PRIVACIDAD</div>
    <div class = 'disclamer'>DISCLAMER</div>
    <div class = 'terminos-de-uso'>TERMINOS DE USO</div>
    </div>
    <p class = 'element-calle-de-la'>123 CALLE DE LA SERENIDAD, DISTRITO CREATIVO</p>
    <div class = 'brain-wave-us-gmail'>BRAIN.WAVE.US@GMAIL.COM</div>
    <p class = 'brainwave-copyright'>BRAINWAVE COPYRIGHT - OWN ELEMENTS</p>
    </div>
    </footer>
    </header>
    </div>
    </div>
    </body>

    </html>
    <script src = '../js/edit.js'></script>
    <?php
} else {
    echo 'Error: No se pudieron recuperar los datos del usuario.';
}
?>