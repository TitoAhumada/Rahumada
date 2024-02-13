<?php

    include_once '../config.php';
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
                    $sql_query = "SELECT * FROM agenda WHERE fecha='".$data[0]."' AND hora='".$data[1]."' ";
                    echo("fecha: ".$data[0]." hora: ".$data[1]);
                    $resultado_sql = mysqli_query($conn,$sql_query);
                    $rowcount=mysqli_num_rows($resultado_sql);
                    echo("Row: ".$rowcount."<br>");
                    if($rowcount == 1){
                        $sql_query = "UPDATE agenda SET rut_c = '".$data[2]."', observacion = '".$data[4]."' , tramite = '".$data[5]."' , estado = '".$data[6]."' WHERE fecha='".$data[0]."' AND hora='".$data[1]."'" ;
                        $resultado_sql = mysqli_query($conn,$sql_query);
                    }            
                }
            $linea = true;
            }
        }
        else if($opc == "contribuyentes_gd"){
            $linea = false;
            while($data = fgetcsv($fp,100,";")){
                if($linea){
                    $sql_query = "SELECT * FROM contribuyentes WHERE rut='".$data[0]."' ";
                    echo("Rut: ".$data[0]);
                    $resultado_sql = mysqli_query($conn,$sql_query);
                    $rowcount=mysqli_num_rows($resultado_sql);
                    echo("Row: ".$rowcount."<br>");
                    if($rowcount == 0){
                        $sql_query = "INSERT INTO contribuyentes(rut,nombres,contacto_1) VALUES('".$data[0]."','".$data[1]."','".$data[2]."') " ;
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
                </select>

            <h3>Nombre Archivo: </h3>
            <input type="text" name="archivo"></input>

            <button type="submit" name="importar">Importar</button>
        </form>
    </body>
</html>

