<?php
    include_once '../config.php';
    $conn = mysqli_connect($host, $user, $pass, $db);
    setlocale(LC_TIME, 'es_CL.UTF-8');
?>

<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="description" content="Esta página se encarga de administrar las reservas y administración del proceso de Licencias de Conducir." />
        
        <title>Agenda Web | Licencias de Conducir | Departamento de Tránsito y Transporte Público | Ilustre Municipalidad de Ovalle</title>

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

        <div class = "opciones">
            <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
                <h3>Seleccione una fecha: </h3>
                <input type="date" name="fecha_busqueda"></input>
                <input type="submit" name= "submit" value="Ver agenda"></input>
                <br>
                <?php
                    if(isset($_POST['submit'])){
                        $fecha = $_POST['fecha_busqueda'];
                        echo date("l d F Y",strtotime($fecha));
                        if (!$conn){
                            echo "Error";
                        }
                        else{
                            echo "Connected successfully";
                        }
                        $sql_query = "SELECT * FROM agenda LEFT JOIN contribuyentes  ON agenda.rut_c = contribuyentes.rut WHERE fecha = '".$fecha."'" ;
                        $resultado_sql = mysqli_query($conn,$sql_query);
                    }
                ?>
            </form>
            <a href="agenda_hoy.php">Recepción de horas.</a> <br>
            <a href="contribuyentes_registrados.php">Ver Contribuyentes.</a> <br>
            <a href="config_agenda.php">Configurar agenda.</a> <br>
            <a href="nueva_reserva.php">Nueva Reserva.</a> <br>
            <a href="csv_to_sql/main.php">Importar datos.</a> <br>
        </div>

        <div class = "agenda_diaria">
            <div class = "tabla">
            <?php if(isset($_POST['submit'])){ ?>
                <h2>Agenda:</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Hora</th> <th>Rut</th> <th>Nombre Completo</th> <th>Contacto</th> <th>Trámite</th> <th>Fecha Solicitud</th> <th>Modificar Trámite</th> <th>Modificar Reserva</th>
                        </tr>
                    </thead>

                    <?php while($mostrar=mysqli_fetch_array($resultado_sql)){ ?>
                    
                    <tr style="cursor:pointer" onclick="seleccionar(this,1)">
                        <td><?php echo $mostrar['hora'] ?></td>
                        <td><?php echo $mostrar['rut_c'] ?></td>
                        <td><?php echo $mostrar['nombres']." ".$mostrar['apellido_p']." ".$mostrar['apellido_m']." "  ?></td> 
                        <td><?php echo $mostrar['contacto_1'] ?></td>
                        <td><?php echo $mostrar['tramite'] ?></td>
                        <td><?php echo $mostrar['fecha_solicitud'] ?></td>
                        <td><?php if(($mostrar['rut_c']) == ""){
                            echo "<a href='registrar_reserva.php?fecha_hora=".$mostrar['fecha']." ".$mostrar['hora']."' > RESERVAR </a>"; 
                        }
                        else{
                        echo "<a href='editar_reserva.php?fecha_hora=".$mostrar['fecha']." ".$mostrar['hora']."' > EDITAR </a>";
                        }
                        ?></td>
                        <td><?php if(($mostrar['rut_c']) != ""){
                            echo "<a href='sistema/eliminar_reserva.php?fecha=".$mostrar['fecha']."&hora=".$mostrar['hora']."' > ELIMINAR </a>"; 
                        } ?>
                        </td>
                        
                    </tr>

                    <?php }?>
                </table>
                    <?php } ?>  
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