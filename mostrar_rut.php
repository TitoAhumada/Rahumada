<?php
    $rut = $_POST['rut'];
    $dv = $_POST['dv'];

    date_default_timezone_set('America/Santiago');

    // Obtener la fecha y hora actuales en el formato "d/m/Y H:i:s"
    $fecha_y_hora = date('d/m/Y H:i:s');


    
?>

<html>
    <head>

        <link rel="stylesheet" href="styles/rut_grande.css">   
    </head>

    <body>
        
        <h3><?php echo $rut . " - ".$dv; ?> </h3>
        <h4><?php echo "Fecha: ".$fecha_y_hora ;?> </h4>
        <a href="rut_grande.php">Volver</a>

        

    </body>
</html>