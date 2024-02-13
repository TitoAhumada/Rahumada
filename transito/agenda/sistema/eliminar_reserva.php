<?php
    include_once '../config.php';
    $conn = mysqli_connect($host, $user, $pass, $db);

    $fecha = $_GET['fecha'];
    $hora = $_GET['hora'];
    echo $fecha;
    echo $hora;

    $sql_query = "UPDATE agenda SET rut_c = null , fecha_solicitud = null WHERE fecha = '".$fecha."' AND hora = '".$hora."' " ;
    $resultado_sql = mysqli_query($conn,$sql_query);

    echo "<script language='JavaScript'>
        alert('La reserva fue liberada exitosamente.');
        location.assign('../agenda_web.php');
        </script>";

?>