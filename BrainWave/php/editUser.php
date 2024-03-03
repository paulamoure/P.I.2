<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../css/editUser.css" />
    </head>
    <body>
        <div class="tipo-de-cita">
            <div class="div">
                <div class="overlap">
                    <div class="overlap-group">
                        <div class="super">
                            <div class="container">
                                <h2>Editar Usuario</h2>
                                <form action="procesar_formulario.php" method="POST">
                                    <label for="nombre">Nombre:</label>
                                    <input type="text" id="nombre" name="nombre" required />
                                    <label for="apellidos">Apellidos:</label>
                                    <input type="text" id="apellidos" name="apellidos" required />

                                    <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                                    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required />

                                    <label for="correo">Correo:</label>
                                    <input type="email" id="correo" name="correo" required />

                                    <label for="descripcion">Descripción:</label>
                                    <textarea id="descripcion" name="descripcion"></textarea>

                                    <input type="submit" value="Guardar Cambios" />
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="text-wrapper-6">
                        <span>BRAINWAVE</span>
                    </div>
                </div>

                <header class="header">
                    <div class="overlap-5">
                        <div class="navbar">
                            <div class="nosotros">NOSOTROS</div>
                            <div class="recursos">RECURSOS</div>
                            <div class="servicios">SERVICIOS</div>

                            <a href="mailto:Email@gmail.com" target="_blank" rel="noopener noreferrer">
                                <div class="text-wrapper-5">Email@gmail.com</div>
                            </a>
                        </div>
                        <div class="rounded-logo"><img class="IMG" src="../img/logo-transp.png" /></div>
                    </div>

                    <footer class="footer">
                        <div class="overlap-40">
                            <div class="rectangle-19"></div>
                            <div class="misc"></div>
                            <div class="contacto">
                                <div class="subscribe-wrapper"><div class="subscribe">SUBSCRIBE</div></div>
                                <div class="text-wrapper-20"><img src="../img/email.png" alt="" /></div>
                                <div class="text-wrapper-30"><img src="../img/location.png" alt="" /></div>
                            </div>
                            <div class="footer-2">
                                <img class="rectangle-20" src="../img/instagram.png" />
                                <img class="rectangle-21" src="../img/Twitter.png" />
                                <img class="rectangle-22" src="../img/facebook.png" />
                                <div class="botn-contacto">
                                    <div class="contactanos-wrapper"><div class="contactanos">CONTACTANOS</div></div>
                                </div>
                                <div class="redes-sociales">REDES SOCIALES</div>
                                <div class="politica-de">POLITICA DE PRIVACIDAD</div>
                                <div class="disclamer">DISCLAMER</div>
                                <div class="terminos-de-uso">TERMINOS DE USO</div>
                            </div>
                            <p class="element-calle-de-la">123 CALLE DE LA SERENIDAD, DISTRITO CREATIVO</p>
                            <div class="brain-wave-us-gmail">BRAIN.WAVE.US@GMAIL.COM</div>
                            <p class="brainwave-copyright">BRAINWAVE COPYRIGHT - OWN ELEMENTS</p>
                        </div>
                    </footer>
                </header>
            </div>
        </div>
    </body>
</html>
