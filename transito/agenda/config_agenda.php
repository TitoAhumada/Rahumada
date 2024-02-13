<?php
    include_once '../config.php';
    $conn = mysqli_connect($host, $user, $pass, $db);

?>

<?php
    if(isset($_POST['enviar'])){
        $fecha = $_POST['fecha_apertura'];
        $hora = $_POST['hora_inicio'];
        $cant_horas = $_POST['cant_horas'];
        $intervalos = $_POST['intervalos'];
        $tramite = $_POST['tramite'];

        $i = 0;
        while ($i < $cant_horas){
            $sql_query = "INSERT INTO agenda(fecha,hora,tramite) values ('".$fecha."','".$hora."','".$tramite."') " ;
            $resultado_sql = mysqli_query($conn,$sql_query);
            $hora_aux = strtotime($hora. '+ 12 minutes');
            $hora = date("H:i:s",$hora_aux);    
            $i = $i + 1;
        }

    }
?>



<html>
  <title>Configuración Reserva Interna de Horas - Dpto. de Tránsito</title>

<body>

    <h1>Reserva Interna de Horas</h1>
    <h4>Departamento de Tránsito y Transporte Público</h4>
    <h4>Ilustre Municipalidad de Ovalle</h4>

    <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
        <h2>Generación de Apertura de Agenda:</h2>

        <h3>Fecha de Apertura Agenda: </h3>
        <input type="date" id="fecha_apertura" name="fecha_apertura" value=""></input>

        <h3>Hora de Inicio: </h3>
        <input type="time" id="hora_inicio" name="hora_inicio" value="08:36"></input>

        <h3>Cantidad de horas: </h3>
        <input type="number" id="cant_horas" name="cant_horas" value="20"></input>

        <h3>Intervalo de horarios (minutos): </h3>
        <input type="number" id="intervalos" name="intervalos" value="12"></input>

        <h3>Tipo de Trámite: </h3>
        <input type="text" id="tramite" name="tramite" value=""></input>


        <button type="submit" name="enviar">Siguiente</button>
        <br>  
    </form>

</body>


</html>