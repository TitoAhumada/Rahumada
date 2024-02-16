<?php
    include_once '../../config.php';
    $conn = mysqli_connect($host, $user, $pass, $db);

    if(isset($_POST['importar'])){
        $opc = $_POST['tabla'];
        $nombre_archivo = $_POST['archivo'];
        $fp = fopen($nombre_archivo,"r");
        if($opc == "agenda_gd"){
            echo "ENTRA";
            $linea = false;
            while($data = fgetcsv($fp,100,";")){
                if($linea){

                    $sql_query_contribuyentes = "SELECT * FROM contribuyentes WHERE rut='".$data[8]."' ";
                    echo("Rut: ".$data[8]);
                    $resultado_sql_contribuyentes = mysqli_query($conn,$sql_query_contribuyentes);
                    $rowcount_contribuyentes=mysqli_num_rows($resultado_sql_contribuyentes);
                    if($rowcount_contribuyentes == 0){
                        $sql_query = "INSERT INTO contribuyentes(rut,nombres,contacto_1) VALUES('".$data[8]."','".$data[2]."','".$data[4]."') " ;
                        $resultado_sql = mysqli_query($conn,$sql_query);
                    } 
                    $sql_query_agenda = "SELECT * FROM agenda WHERE fecha='".$data[0]."' AND hora='".$data[1]."' ";
                    echo("fecha: ".$data[0]." hora: ".$data[1]);
                    $resultado_sql_agenda = mysqli_query($conn,$sql_query_agenda);
                    $rowcount_a=mysqli_num_rows($resultado_sql_agenda);
                    echo("Row: ".$rowcount_a."<br>");
                    if($rowcount_a == 1){
                        $sql_query_agenda_2 = "UPDATE agenda SET rut_c = '".$data[8]."', observacion = '".$data[5]."' , tramite = '".$data[6]."' , estado = '".$data[7]."' WHERE fecha='".$data[0]."' AND hora='".$data[1]."'" ;
                        $resultado_sql_agenda_2 = mysqli_query($conn,$sql_query_agenda_2);
                    }
                    else if ($rowcount == 0){
                        $sql_query_agenda_2 = "INSERT INTO agenda(fecha,hora,tramite) values ('".$data[0]."','".$data[1]."','".$data[6]."') " ;
                        $resultado_sql_agenda_2 = mysqli_query($conn,$sql_query_agenda_2);

                        $sql_query_agenda_3 = "UPDATE agenda SET rut_c = '".$data[8]."', observacion = '".$data[5]."' , tramite = '".$data[6]."' , estado = '".$data[6]."' WHERE fecha='".$data[0]."' AND hora='".$data[1]."'" ;
                        $resultado_sql_agenda_3 = mysqli_query($conn,$sql_query_agenda_3);
                    }            
                }
            $linea = true;
            }
        }
        else if($opc == "contribuyentes_gd"){
            $linea = false;
            while($data = fgetcsv($fp,100,";")){
                if($linea){
                    $sql_query = "SELECT * FROM contribuyentes WHERE rut='".$data[2]."' ";
                    echo("Rut: ".$data[2]);
                    $resultado_sql = mysqli_query($conn,$sql_query);
                    $rowcount=mysqli_num_rows($resultado_sql);
                    echo("Row: ".$rowcount."<br>");
                    if($rowcount == 0){
                        $sql_query = "INSERT INTO contribuyentes(rut,nombres,contacto_1) VALUES('".$data[2]."','".$data[3]."','".$data[5]."') " ;
                        $resultado_sql = mysqli_query($conn,$sql_query);
                    }            
                }
            $linea = true;
            }
        
        }
        
        else if($opc == "solo_agenda_gd"){
            echo "ENTRA";
            $linea = false;
            while($data = fgetcsv($fp,100,";")){
                if($linea){
                    $sql_query = "SELECT * FROM agenda WHERE fecha='".$data[0]."' AND hora='".$data[1]."' ";
                    echo("fecha: ".$data[0]." hora: ".$data[1]);
                    $resultado_sql = mysqli_query($conn,$sql_query);
                    $rowcount=mysqli_num_rows($resultado_sql);
                    echo("Row: ".$rowcount."<br>");
                    if($rowcount == 1){
                        $sql_query = "UPDATE agenda SET rut_c = '".$data[2]."', observacion = '".$data[5]."' , tramite = '".$data[6]."' , estado = '".$data[7]."' WHERE fecha='".$data[0]."' AND hora='".$data[1]."'" ;
                        $resultado_sql = mysqli_query($conn,$sql_query);
                    }            
                }
            $linea = true;
            }
        }
        fclose($fp);
    }
    mysqli_close($conn);

?>

<html>
    <head>
        <title>Importar datos a la base de datos.</title>
    </head>

    <body>

        <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
            <h3>Tabla que desea importar: </h3>
                <select id="tabla" name="tabla" required>
                    <option value="">Selecciona una tabla.</option>
                    <option value="contribuyentes_gd">Contribuyentes Google Drive</option>
                    <option value="agenda_gd">Agenda Google Drive</option>
                    <option value="solo_agenda_gd">Solo Agenda Google Drive</option>
                    
                </select>

            <h3>Nombre Archivo: </h3>
            <input type="text" name="archivo"></input>

            <button type="submit" name="importar">Importar</button>
        </form>
    </body>
</html>

