<?php
    include_once '../config.php';
    $conn = mysqli_connect($host, $user, $pass, $db);

    $fechaActual = date('Y-m-d',strtotime('today'));
    if (!$conn){
        echo "Error";
    }
    else{
        //echo "Connected successfully";
    }
    $sql_query = "SELECT * FROM agenda LEFT JOIN contribuyentes  ON agenda.rut_c = contribuyentes.rut WHERE fecha = '".$fechaActual."'" ;
    $resultado_sql = mysqli_query($conn,$sql_query);

?>


<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="description" content="Esta página se encarga de administrar las reservas y administración del proceso de Licencias de Conducir." />
        
        <title>Agenda de Hoy | Licencias de Conducir | Departamento de Tránsito y Transporte Público | Ilustre Municipalidad de Ovalle</title>

        <meta name="viewport" content="width=device-width, inictial-scale=1.0"/>
        
        <script src="https://kit.fontawesome.com/3e400a99ce.js" crossorigin="anonymous"></script>
        
        <link rel="stylesheet" href="../styles/stylesheet.css">
    </head>

    <body>

        <header class="header">
            <div class="logo">
                <a href="http://municipalidadovalle.cl">
                    <img src="../img/logos/logo_imo_web.svg" alt ="Logo Municipalidad">
                </a>
                
            </div>

            <div class = "nav">
                <ul class="menu">
                    <li><a href="../principal.php">Inicio</a></li>
                    <li><a href="#">Agenda</a>
                        <ul>
                            <li><a href="agenda/agenda_hoy.php">M-PS</a></li>
                            <li><a href="#">Teórico</a></li>
                            <li><a href="#">Práctico</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Listado de Horas</a>
                        <ul>
                            <li><a href="agenda_web.php">M-PS</a></li>
                            <li><a href="#">Teórico</a></li>
                            <li><a href="#">Práctico</a></li>
                        </ul></li>
                    <li><a href="#">Configurador</a></li>
                </ul>
            </div>
        </header>

        <div class = "agenda_diaria">
            <div class ="wrap">
                <div class = "widget">
                    <div class = "fecha">
                        <p id="diaSemana" class="diaSemana"></p>
                        <p id="dia" class="dia"></p>
                        <p>de </p>
                        <p id="mes" class="mes"></p>
                        <p>de </p>
                        <p id="year" class="year"></p>
                    </div>

                    <div class = "reloj">
                        <p id="horas" class="horas"></p>
                        <p>:</p>
                        <p id="minutos" class="minutos"></p>
                        <p>:</p>
                        <p class="caja-segundos">
                            <p id="ampm" class="ampm"></p>
                            <p id="segundos" class="segundos"></p>
                        </p>
                    </div>
                </div>
            </div>
            <script src="sistema/reloj.js"></script>

            <div class="tabla">
                <h3>Agenda de Hoy</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Hora</th> <th>Rut</th> <th>Nombre Completo</th> <th>Contacto</th> <th>Trámite</th> <th>Estado</th> <th>Acción</th>
                        </tr>
                    </thead>
                    
                    <?php while($mostrar=mysqli_fetch_array($resultado_sql)){ ?>
                        
                    <tr style="cursor:pointer" onclick="seleccionar(this,1)">
                        <td><?php echo $mostrar['hora'] ?></td>
                        <td><?php echo $mostrar['rut_c'] ?></td>
                        <td><?php echo $mostrar['nombres']." ".$mostrar['apellido_p']." ".$mostrar['apellido_m']." "  ?></td> 
                        <td><?php echo $mostrar['contacto_1'] ?></td>
                        <td><?php echo $mostrar['tramite'] ?></td>
                        <td><?php 
                                    if($mostrar['estado'] == 'Atendido'){
                                        echo "<i class='fa-solid fa-check-double'></i>";
                                    }else if($mostrar['estado'] == 'Por Atender'){
                                        echo "<i class='fa-solid fa-check'></i>";
                                    }else if($mostrar['estado'] == 'Pendiente'){
                                        echo "<i class='fa-solid fa-circle-exclamation'></i>";
                                    }else if($mostrar['estado'] == 'No Asistió'){
                                        echo "<i class='fa-solid fa-xmark'></i>";
                                    }
                        ?></td>
                        <td><?php echo "<a class='fa-solid fa-check-double' href='sistema/camb_est_atendido.php?fecha=".$mostrar['fecha']."&hora=".$mostrar['hora']."' >  </a>";
                                echo "<a class='fa-solid fa-check' href='sistema/camb_est_patender.php?fecha=".$mostrar['fecha']."&hora=".$mostrar['hora']."' >  </a>";
                                echo "<a class='fa-solid fa-circle-exclamation' href='sistema/camb_est_pendiente.php?fecha=".$mostrar['fecha']."&hora=".$mostrar['hora']."' >  </a>";
                                echo "<a class='fa-solid fa-xmark' href='sistema/camb_est_noasistio.php?fecha=".$mostrar['fecha']."&hora=".$mostrar['hora']."' >  </a>";
                        ?> </td>                       
                    </tr>

                    <?php }?>
                </table>
            </div>
            
                
        </div>

        <footer class="pie-pagina">
            <div class="grupo-1">
                <div class="box">
                    <figure>
                        <a href="#">
                            <img src = "../img/logos/AGPIXLPRO_LOGO.svg" alt="Logo Desarrollador">
                        </a>
                    </figure>
                </div>
                
                <div class="box">
                    <h2>SOBRE NOSOTROS</h2>
                    <p>Parrafo </p>
                    <p>Parrafo </p>
                </div>
                    
                <div class="box">   
                    <h2>SIGUENOS</h2>  
                    <div class="red-social"> 
                        <a href="#" class="fa fa-facebook"></a> 
                        <a href="#" class="fa fa-instagram"></a> 
                        <a href="#" class="fa fa-linkedin"></a>
                        <a href="#" class="fa fa-twitter"></a>
                    </div>
                </div>
            </div>
            
            <div class="grupo-2">
                <small>&copy; 2024 <b>Roberto Ahumada R.</b> - Todos los derechos reservados.</small>
            </div>

        </footer>
    </body>
</html>