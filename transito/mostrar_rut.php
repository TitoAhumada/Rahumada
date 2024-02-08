<?php
    $rut = $_POST['rut'];

    date_default_timezone_set('America/Santiago');

    // Obtener la fecha y hora actuales en el formato "d/m/Y H:i:s"
    $fecha_y_hora = date('d/m/Y H:i:s');



?>

<html>
    <head>

        <link rel="stylesheet" href="styles/rut_grande.css">   
    </head>

    <body>
        <h5><a href="rut_grande.php">Volver</a></h4>
        <h3><?php echo $rut; ?> </h3>
        <h4><?php echo "Fecha: ".$fecha_y_hora ;?> </h4>
    </body>
</html>