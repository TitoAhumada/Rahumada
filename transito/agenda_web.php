<?php
    include_once 'config.php';
    $conn = mysqli_connect($host, $user, $pass, $db);
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
                        echo $fecha;
                        if (!$conn){
                            echo "Error";
                        }
                        else{
                            echo "Connected successfully";
                        }
                        $sql_query = "SELECT * FROM agenda WHERE fecha = '".$fecha."'" ;
                        $resultado_sql = mysqli_query($conn,$sql_query);
                    }
                ?>
            </form>
            <a href="contribuyentes_registrados.php">Ver Contribuyentes.</a>
        </div>

        <div class = "agenda_diaria">
            <?php if(isset($_POST['submit'])){ ?>
                <h2>Agenda:</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Hora</th> <th>Rut</th> <th>Nombres</th> <th>Apellido Paterno</th> <th>Apellido Materno</th> <th>Contacto</th> <th>Trámite</th> <th>Fecha Solicitud</th> <th>Modificar</th> 
                        </tr>
                    </thead>

                    <?php while($mostrar=mysqli_fetch_array($resultado_sql)){ ?>
                    
                    <tr style="cursor:pointer" onclick="seleccionar(this,1)">
                        <td><?php echo $mostrar['hora'] ?></td>
                        <td><?php echo $mostrar['rut_c'] ?></td>
                        <td><?php echo "nombre " ?></td> 
                        <td><?php echo "app " ?></td>
                        <td><?php echo "apm " ?></td>
                        <td><?php echo "contacto " ?></td>
                        <td><?php echo $mostrar['tramite'] ?></td>
                        <td><?php echo $mostrar['fecha_solicitud'] ?></td>
                        <td><?php echo " MODIFICAR "; ?></td>
                    </tr>

                    <?php }?>
                </table>
                    <?php } ?>
                
        </div>
    </body>
</html>