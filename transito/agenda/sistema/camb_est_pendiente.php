<?php
    include_once '../../config.php';
    $conn = mysqli_connect($host, $user, $pass, $db);

    $fecha = $_GET['fecha'];
    $hora = $_GET['hora'];

    $sql_query = "UPDATE agenda SET estado = 'Pendiente' WHERE fecha = '".$fecha."' AND hora = '".$hora."' " ;
    $resultado_sql = mysqli_query($conn,$sql_query);

    echo "<script language='JavaScript'>
        alert('El estado ha sido cambiado por Pendiente.');
        location.assign('../agenda_hoy.php');
        </script>";

?>