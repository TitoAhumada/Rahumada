<?php

    $licencia = $_POST['licencia'];
    echo "Tipo de Licencia: ".$licencia. "<br>";
    $restriccion = $_POST['restriccion'];
    echo "Posee restricción: ".$restriccion. "<br>";
    $fecha_medico = $_POST['f_examen'];
    echo "Realizó examen médico el: ".$fecha_medico. "<br>";
    $fecha_nacimiento = $_POST['f_nacimiento'];
    echo "Fecha de nacimiento: ".$fecha_nacimiento. "<br>";

    if ($restriccion == 'si'){
        $anos_restriccion = $_POST['a_c_restr'];
        if($anos_restriccion == '0,5'){
            $mod_date = strtotime($fecha_medico."+ 6 months");
            echo date("d-m-Y",$mod_date). "<br>";
        }  
        else if($anos_restriccion == '1'){
            $mod_date = strtotime($fecha_medico."+ 1 years");
            echo date("d-m-Y",$mod_date). "<br>";
        }  
        else if($anos_restriccion == '2'){
            $mod_date = strtotime($fecha_medico."+ 2 years");
            echo date("d-m-Y",$mod_date). "<br>";
        }  
        else if($anos_restriccion == '3'){
            $mod_date = strtotime($fecha_medico."+ 3 years");
            echo date("d-m-Y",$mod_date). "<br>";
        }  
        else if($anos_restriccion == '4'){
            $mod_date = strtotime($fecha_medico."+ 4 years");
            echo date("d-m-Y",$mod_date). "<br>";
        }  
        else if($anos_restriccion == '5'){
            $mod_date = strtotime($fecha_medico."+ 5 years");
            echo date("d-m-Y",$mod_date)."<br>";
        }   
    }
    else if ($restriccion == 'no'){
        $f_medico = strtotime($fecha_medico);
        $ano_medico = date("Y", $f_medico);
        $mes_medico = date("m", $f_medico);
        $dia_medico = date("d", $f_medico);
        if($licencia == 'profesional'){
            $ano_control = $ano_medico + 4;
            $f_nacimiento = strtotime($fecha_nacimiento);
            $mes_nacimiento = date("m", $f_nacimiento);
            $dia_nacimiento = date("d", $f_nacimiento);
            echo "Fecha próximo examen: ".$dia_nacimiento."-".$mes_nacimiento."-".$ano_control."<br>";
            
        }
        else if($licencia == 'no_profesional'){
            $ano_control = $ano_medico + 6;
            $f_nacimiento = strtotime($fecha_nacimiento);
            $mes_nacimiento = date("m", $f_nacimiento);
            $dia_nacimiento = date("d", $f_nacimiento);
            echo "Fecha próximo examen: ".$dia_nacimiento."-".$mes_nacimiento."-".$ano_control."<br>";
        }

    }

    

?>