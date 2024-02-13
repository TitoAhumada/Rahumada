<?php
    include_once '../config.php';
    $conn = mysqli_connect($host, $user, $pass, $db);
?>

<html>
    <head>
        <title>Ver Contribuyentes - Agenda interna</title>
    </head>

    <body>
        <div class = "opciones">
            <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
                <h3>Rut: </h3>
                <input type="text" name="rut_busqueda" placeholder="19876345-1"></input>
                <input type="submit" name= "submit" value="Buscar"></input>
                <br>
                <?php
                    if(isset($_POST['submit'])){
                        $rut = $_POST['rut_busqueda'];
                        if (!$conn){
                            echo "Error";
                        }
                        else{
                            echo "Connected successfully";
                        }
                        mysqli_close($conn);
                    }
                    else{
                        $sql_query = "SELECT * FROM contribuyentes ORDER BY apellido_p ASC, apellido_m ASC, nombres ASC";
                        $resultado_sql = mysqli_query($conn,$sql_query);
                    }
                ?>
            </form>

            <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
                <h2>Ingresar nuevo contribuyente:</h2>
                <h3>Rut: </h3>
                <input type="text" name="rut_ingreso" placeholder="19876345-1"></input>
                <h3>Nombres: </h3>
                <input type="text" name="nombres_ingreso" placeholder="Juan"></input>
                <h3>Apellido Paterno: </h3>
                <input type="text" name="app_ingreso" placeholder="Pérez"></input>
                <h3>Apellido Materno: </h3>
                <input type="text" name="apm_ingreso" placeholder="Delano"></input>
                <h3>Contacto: </h3>
                <input type="number" name="contacto_ingreso" placeholder="987654321"></input>
                <h3>Correo Electrónico: </h3>
                <input type="text" name="email_ingreso" placeholder="jperez@imovalle.cl"></input>
                <input type="submit" name= "registrar" value="Registrar"></input>
                <br>
                <?php
                    if(isset($_POST['registrar'])){
                        $rut_ingreso = $_POST['rut_ingreso'];
                        $nombres_ingreso = $_POST['nombres_ingreso'];
                        $app_ingreso = $_POST['app_ingreso'];
                        $apm_ingreso = $_POST['apm_ingreso'];
                        $contacto_ingreso = $_POST['contacto_ingreso'];
                        $email_ingreso = $_POST['email_ingreso'];
                        $sql_query = "INSERT INTO contribuyentes(rut,nombres,apellido_p,apellido_m,contacto_1,correo) VALUES('".$rut_ingreso."','".$nombres_ingreso."','".$app_ingreso."','".$apm_ingreso."','".$contacto_ingreso."','".$email_ingreso."') " ;
                        $resultado_sql = mysqli_query($conn,$sql_query);
                        header("Location: contribuyentes_registrados.php");
                    } 
                ?>
                
            </form>

            <div class="tabla_contribuyentes">
                <h2>Listado contribuyentes:</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Rut</th> <th>Nombre Completo</th> <th>Contacto</th> <th>Correo Electrónico</th> <th>Editar</th>
                        </tr>
                    </thead>

                    <?php while($mostrar=mysqli_fetch_array($resultado_sql)){ ?>
                    
                    <tr style="cursor:pointer" onclick="seleccionar(this,1)">
                        <td><?php echo $mostrar['rut'] ?></td>
                        <td><?php echo $mostrar['nombres']." ".$mostrar['apellido_p']." ".$mostrar['apellido_m']." " ?></td>
                        <td><?php echo $mostrar['contacto_1'] ?></td>
                        <td><?php echo $mostrar['correo'] ?></td>
                        <td><?php echo "<a href='?rut=".$mostrar['rut']."' > EDITAR </a>"; ?></td>
                    </tr>

                    <?php }?>
                </table>
            </div>

            <a href="agenda_web.php">Volver.</a>
        </div> 
    </body>
</html>