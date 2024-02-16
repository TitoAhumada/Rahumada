<?php
    include_once '../config.php';
    $conn = mysqli_connect($host, $user, $pass, $db);
    setlocale(LC_TIME, 'es_CL.UTF-8');
?>

<html>
    <head>
        <title>Agenda interna.</title>
    </head>

    <body>
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
            <a href="contribuyentes_registrados.php">Ver Contribuyentes.</a> <br>
            <a href="config_agenda.php">Configurar agenda.</a> <br>
            <a href="nueva_reserva.php">Nueva Reserva.</a> <br>
            <a href="csv_to_sql/main.php">Importar datos.</a> <br>
        </div>

        <div class = "agenda_diaria">
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
    </body>
</html>