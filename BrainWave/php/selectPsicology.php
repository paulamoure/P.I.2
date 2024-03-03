<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="globals.css" />
        <link rel="stylesheet" href="styleguide.css" />
        <link rel="stylesheet" href="../css/selectPsicology.css" />
    </head>
    <body>
        <div class="tipo-de-cita">
            <div class="div">
                <div class="overlap">
                    <div class="overlap-group">
                        <div class="rectangle"></div>
                        <a href="dashboard.php">  <button class="secondary-buttons" >Anterior</button></a>
                      
                        <div class="elige-la-modalidad">ELIGE UN PSICÓLOGO</div>
                        <div class="card-container">
                            <?php
                            require_once 'conecta.php';

                            session_start();

                            if (isset($_GET['modalidad'])) {
                                $modalidad = $_GET['modalidad'];

                                $query = "SELECT * FROM psycologists WHERE modality = '$modalidad'";
                                $result = mysqli_query(getConexion(), $query);

                                if ($result && mysqli_num_rows($result) > 0) {
                                    while ($psicologo = mysqli_fetch_assoc($result)) {
                                        echo "<div class='card'>";
                                        echo "<div>";
                                        echo "<img src='" . $psicologo['img'] . "' alt='Usuario' />";
                                        echo "<h2>" . $psicologo['name'] . "</h2>";
                                        echo "<p>" . $psicologo['detail'] . "</p>";
                                        echo "<a href='chooseDate.php?usuario=" . $_SESSION['username'] . "&psicologo=" . $psicologo['id'] . "' class='btn'>Elegir</a>";
                                        echo "</div>";
                                        echo "</div>";
                                    }
                                } else {
                                    echo "<h2>No hay psicólogos disponibles</h2>";
                                }

                                mysqli_free_result($result);
                            } else {
                                header('Location: dashboard.php');
                                exit();
                            }
                            ?>

                        </div>
                        <div class="container">
                            <button class="btn-backward">
                                <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="800" height="800" viewBox="0 0 330 330">
                                    <path
                                        d="M111.213 165.004 250.607 25.607c5.858-5.858 5.858-15.355 0-21.213-5.858-5.858-15.355-5.858-21.213.001l-150 150.004a15 15 0 0 0 0 21.212l150 149.996C232.322 328.536 236.161 330 240 330s7.678-1.464 10.607-4.394c5.858-5.858 5.858-15.355 0-21.213L111.213 165.004z"
                                    />
                                </svg>
                            </button>
                            <button class="btn-forward">
                                <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="800" height="800" viewBox="0 0 330 330">
                                    <path
                                        d="m250.606 154.389-150-149.996c-5.857-5.858-15.355-5.858-21.213.001-5.857 5.858-5.857 15.355.001 21.213l139.393 139.39L79.393 304.394c-5.857 5.858-5.857 15.355.001 21.213C82.322 328.536 86.161 330 90 330s7.678-1.464 10.607-4.394l149.999-150.004a14.996 14.996 0 0 0 0-21.213z"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="overlap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="382" height="674" viewBox="0 0 382 674" fill="none">
                            <path
                                d="M0 13C0 5.82029 5.8203 0 13 0H369C376.18 0 382 5.8203 382 13V658.974C382 670.907 367.269 676.536 359.312 667.643L204.487 494.603C199.392 488.908 190.507 488.816 185.294 494.403L22.5052 668.879C14.4552 677.507 0 671.811 0 660.01V13Z"
                                fill="#47DF9F"
                            />
                            <path
                                d="M0 13C0 5.82029 5.8203 0 13 0H369C376.18 0 382 5.8203 382 13V658.974C382 670.907 367.269 676.536 359.312 667.643L204.487 494.603C199.392 488.908 190.507 488.816 185.294 494.403L22.5052 668.879C14.4552 677.507 0 671.811 0 660.01V13Z"
                                fill="#47DF9F"
                            />
                        </svg>
                        <div class="paso">PASO 3</div>
                        <div class="text-wrapper">PASO 2</div>
                        <div class="overlap-3">
                            <div class="paso-2">PASO 1</div>

                            <div class="elige-modalidad">ELIGE&nbsp;&nbsp;MODALIDAD</div>
                        </div>
                        <div class="elige-psc-logo">ELIGE PSCÓLOGO</div>
                        <div class="elige-fecha">ELIGE FECHA</div>
                        <div class="div-wrapper">
                            <div class="text-wrapper-2">3</div>
                        </div>
                        <div class="overlap-group-2">
                            <div class="text-wrapper-3">1</div>
                        </div>
                        <div class="cita">CITA</div>
                        <div class="overlap-4">
                            <div class="text-wrapper-4">2</div>
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
    <script src="../js/pagination.js"></script>
</html>
