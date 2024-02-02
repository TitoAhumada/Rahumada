<?php
    $sentencia = $_POST['sentencia'];
    $tribunal = $_POST['tribunal'];
    $comuna = $_POST['comuna'];
    $n_causa = $_POST['n_causa'];
    $motivo = $_POST['motivo'];
    $ppu = $_POST['ppu'];
    $marca = $_POST['marca'];
    $fecha_inf = $_POST['fecha_inf'];
    $fecha_cit = $_POST['fecha_cit'];
    $multa = $_POST['multa'];

    echo $sentencia." en ".$tribunal." ".$comuna." Causa: ".$n_causa." por "
    .$motivo." PPU: ".$ppu." ".$marca." Cursado el: ".$fecha_inf." Citado "
    .$fecha_cit." Multa: ".$multa." UTM";
?>