<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../css/seeDate.css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    </head>
    <body>
        <div class="tipo-de-cita">
            <div class="div">
                <div class="overlap">
                    <div class="overlap-group">
                        <div class="rectangle"></div>
                        <a href="dashboard.php"> <button class="secondary-buttons">Anterior</button></a>

                        <div class="elige-la-modalidad">FECHAS PROGRAMADAS</div>

                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Fecha</th>
                                                    <th>Hora</th>
                                                    <th>Psicologo</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                require_once 'conecta.php';
                                                $user = $_GET['user'];
                                                $query = "SELECT q.date, q.hour, p.name 
                                                    FROM quote q 
                                                    INNER JOIN psycologists p ON q.id_psicology = p.id
                                                    WHERE q.username = '$user' AND q.date >= CURDATE() ORDER BY q.date ASC, q.hour ASC"; $result = mysqli_query(getConexion(), $query); while ($row = mysqli_fetch_array($result)) { ?>
                                                <tr>
                                                    <td><?php echo $row['date']; ?></td>
                                                    <td><?php echo $row['hour']; ?></td>
                                                    <td><?php echo $row['name']; ?></td>
                                                </tr>
                                                <?php }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
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
</html>
