<?php
    include_once '../config.php';
    $conn = mysqli_connect($host, $user, $pass, $db);

    $fechaActual = date('Y-m-d',strtotime('today'));
    if (!$conn){
        echo "Error";
    }
    else{
        echo "Connected successfully";
    }
    $sql_query = "SELECT * FROM agenda LEFT JOIN contribuyentes  ON agenda.rut_c = contribuyentes.rut WHERE fecha = '".$fechaActual."'" ;
    $resultado_sql = mysqli_query($conn,$sql_query);

?>


<html>
    <head>
        <title>Agenda interna.</title>
    </head>

    <body>

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

        <div class = "agenda_diaria">
            <h2>Agenda:</h2>
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
                    <td><?php echo "Estado"?></td>
                    <td><?php echo "Acción"?></td>                       
                </tr>

                <?php }?>
            </table>
                
        </div>
    </body>
</html>