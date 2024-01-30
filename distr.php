<html>
    <head>
        <title>Distribución de Tránsito</title>
        <link rel="stylesheet" href="styles/stylesheet.css">
    </head>

    <body>
        <h1>Distribución de fechas de Licencias</h1>

        <form method="POST" action="distr_calc.php">

        <h3>Fecha de Nacimiento:</h3>
        <input type="date" name="f_nacimiento" />

            <h3>Licencias Solicitadas:</h3>
            <h4>Profesional: </h4>
                <input type="checkbox" id="a1_19495" name="a1_19495" value="a1">
                <label for="a1_19495"> A 1</label>
                <input type="checkbox" id="a2_19495" name="a2_19495" value="a2">
                <label for="a2_19495"> A 2</label>
                <input type="checkbox" id="a3_19495" name="a3_19495" value="a3">
                <label for="a3_19495"> A 3</label>
                <input type="checkbox" id="a4_19495" name="a4_19495" value="a4">
                <label for="a2_19495"> A 4</label>
                <input type="checkbox" id="a5_19495" name="a5_19495" value="a5">
                <label for="a3_19495"> A 5</label><br>
                <input type="checkbox" id="a1_18290" name="a1_18290" value="a1_18290">
                <label for="a1_18290"> A 1 Ley 18.290 </label>
                <input type="checkbox" id="a2_18290" name="a2_18290" value="a2_18290">
                <label for="a2_18290"> A 2 Ley 18.290 </label><br>

            <h4>No profesional: </h4>
                <input type="checkbox" id="b_18290" name="b_18290" value="b">
                <label for="b_18290"> B </label>
                <input type="checkbox" id="c_18290" name="c_18290" value="c">
                <label for="b_18290"> C </label>

            <h4>Especiales: </h4>
                <input type="checkbox" id="d_18290" name="d_18290" value="d">
                <label for="d_18290"> D </label>
                <input type="checkbox" id="e_18290" name="e_18290" value="e">
                <label for="e_18290"> E </label>
                <input type="checkbox" id="f_18290" name="f_18290" value="f">
                <label for="f_18290"> F </label>

            
            <h3>Examen Médico: </h3>
            <h4>Examinador:
            <select id="ev_medica" name="ev_medica">
                <option value="x"> </option>
                <option value="c_lopez">Crescente López</option>
                <option value="m_manzanilla">Maria Manzanilla</option>
                <option value="r_matamala">Ricardo Matamala</option>
                <option value="p_jara">Paula Jara</option>
            </select>

            Fecha de Examen Médico: 
            <input type="date" name="f_examen" /> </h4>

            <h3>Examen Teórico: </h3>
            <h4>Examinador: 
            <select id="ex_teorico" name="ex_teorico">
                <option value=" "> </option>
                <option value="r_alvarez">Ronald Álvarez</option>
                <option value="l_esquivel">Luciano Esquivel</option>
                <option value="c_orellana">Cristian Orellana</option>
                <option value="a_tapia">Alex Tapia</option>
            </select>

            Fecha de Examen Teórico: 
            <input type="date" name="f_examen_teorico"/> </h4>

            <h3>Examen Práctico: </h3>
            <h4>Examinador: 
            <select id="ex_practico" name="ex_practico">
                <option value="x"> </option>
                <option value="r_alvarez">Ronald Álvarez</option>
                <option value="l_esquivel">Luciano Esquivel</option>
                <option value="c_orellana">Cristian Orellana</option>
                <option value="a_tapia">Alex Tapia</option>
            </select>

            Fecha de Examen Práctico: 
            <input type="date" name="f_examen_practico" /> </h4>

            <h3>Control Restringido:
            <select id="restriccion" name="restriccion">
                <option value="no">No</option>
                <option value="si">Si</option>
            </select>

            Años de Control Restringido (Médico o Antecedente): 
            <select id="a_c_restr" name="a_c_restr">
                <option value="0">Sin Restricción</option>
                <option value="0,5">6 Meses</option>
                <option value="1">1 Año</option>
                <option value="2">2 Años</option>
                <option value="3">3 Años</option>
                <option value="4">4 Años</option>
                <option value="5">5 Años</option>
            </select> </h3>

            <h3>Fecha de Vencimiento anterior: </h3>
            <input type="date" name="f_ultimocontrol" />

            <input type="submit">

            <br><br><h3>Copyright 2024, Roberto Ahumada R. </h3>;
        </form>

    </body>
</html>