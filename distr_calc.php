<?php
    $a1 = isset($_POST['a1_19495']);
    $a2 = isset($_POST['a2_19495']);
    $a3 = isset($_POST['a3_19495']);
    $a4 = isset($_POST['a4_19495']);
    $a5 = isset($_POST['a5_19495']);
    $a1_18290 = isset($_POST['a1_18290']);
    $a2_18290 = isset($_POST['a2_18290']);
    $b = isset($_POST['b_18290']);
    $c = isset($_POST['c_18290']);
    $d = isset($_POST['d_18290']);
    $e = isset($_POST['e_18290']);
    $f = isset($_POST['f_18290']);

    $fecha_nacimiento = $_POST['f_nacimiento'];
    $fecha_teorico = $_POST['f_examen_teorico'];
    $fecha_practico = $_POST['f_examen_practico'];
    $fecha_ult_control = $_POST['f_ultimocontrol'];

    if ($a1 || $a2 || $a3 || $a4 || $a5 || $a1_18290 || $a2_18290){
        $licencia = 'profesional';
    }
    else{
        $licencia = 'no_profesional';
    }

    echo "Licencias solicitadas: <br>";
    if ($a1){
        echo "A1 / ";
    }
    if ($a2){
        echo "A2 /";
    }
    if ($a3){
        echo "A3 /";
    }
    if ($a4){
        echo "A4 ";
    }
    if ($a5){
        echo "A5";
    }

    if ($a1 || $a2 || $a3 || $a4 || $a5){
        echo " Ley 19.495 / ";
    }

    if ($a1_18290 || $a2_18290){
            if ($a1_18290){
                echo "A1";
            }
            if ($a1_18290 && $a2_18290){
                echo " / ";
            }
            if ($a2_18290){
                echo "A2";
            }
            echo " Ley 18.290";
    }

    if($b){
        echo "B / ";
    }
    if($c){
        echo "C / ";
    }
    if($d){
        echo "D / ";
    }
    if($e){
        echo "E / ";
    }
    if($f){
        echo "F / ";
    }
    echo "<br>";
    
    echo "Tipo de Licencia: ".$licencia. "<br>";
    $restriccion = $_POST['restriccion'];
    echo "Posee restricción: ".$restriccion. "<br>";
    $fecha_medico = $_POST['f_examen'];

    $f_nacimiento = strtotime($fecha_nacimiento);
    $f_ult_control = strtotime($fecha_ult_control);
    echo "Fecha de nacimiento: ".date("d-m-Y",$f_nacimiento). "<br>";
    echo "Fecha de control anterior: ".date("d-m-Y",$f_ult_control). "<br>";

    $f_medico = strtotime($fecha_medico);
    $f_teorico = strtotime($fecha_teorico);
    $f_practico = strtotime($fecha_practico);
    $f_u_control = strtotime($fecha_ult_control);

    if($f_practico > $f_teorico){
        $f_control = $f_practico;
    }
    else if($f_teorico > $f_medico){
        $f_control = $f_teorico;
    }
    else{
        $f_control = $f_medico;
    }

    
    if ($restriccion == 'si'){
        $anos_restriccion = $_POST['a_c_restr'];
        $ano_control = date("Y", $f_control);
        $mes_control = date("m", $f_control);
        $dia_control = date("d", $f_control);
        if($anos_restriccion == '0,5'){
            $mod_date = $f_control."+ 6 months";
            echo date("d-m-Y",$mod_date). "<br>";
        }  
        else if($anos_restriccion == '1'){
            $ano_control = $ano_control + 1;
        }  
        else if($anos_restriccion == '2'){
            $ano_control = $ano_control + 2;
        }  
        else if($anos_restriccion == '3'){
            $ano_control = $ano_control + 3;
        }  
        else if($anos_restriccion == '4'){
            $ano_control = $ano_control + 4;
        }  
        else if($anos_restriccion == '5'){
            $ano_control = $ano_control + 5;
        }
        echo "Fecha próximo examen: ".$dia_control."-".$mes_control."-".$ano_control."<br>";
    
    }
    else if ($restriccion == 'no'){
        $fecha_control = $f_control;
        $a_ult_control = date("Y", $f_u_control);
        $ano_control = date("Y", $fecha_control);
        $mes_control = date("m", $fecha_control);
        $dia_control = date("d", $fecha_control);

        $f_nacimiento = strtotime($fecha_nacimiento);
        $mes_nacimiento = date("m", $f_nacimiento);
        $dia_nacimiento = date("d", $f_nacimiento);

        if($licencia == 'profesional'){
            $ano_control = $ano_control + 4;
        }
        else if($licencia == 'no_profesional'){
            if($a_ult_control  >= 2020 && $a_ult_control <= 2023){
                $ano_control = $a_ult_control + 6;
            }else{
                $ano_control = $ano_control + 6;
            } 
        }
        echo "Fecha próximo examen: ".$dia_nacimiento."-".$mes_nacimiento."-".$ano_control."<br>";
    }

    

    echo "Realizó examen médico el: ".date("d-m-Y",$f_medico). "<tab>";
    echo " Examinador: " .$_POST['ev_medica']. "  <br>";
    echo "Realizó examen teórico el: ".date("d-m-Y",$f_teorico). "<tab>";
    echo " Examinador: " .$_POST['ex_teorico']. " <br>";
    echo "Realizó examen práctico el: ".date("d-m-Y",$f_practico). "<tab>";
    echo " Examinador: " .$_POST['ex_practico']. "<br>";

   $f_medico = strtotime($fecha_medico);

    echo "<br><br>Copyright 2024, Roberto Ahumada R. ";

?>