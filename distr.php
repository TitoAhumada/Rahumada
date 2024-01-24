<html>
    <head>
        <title>Distribución de Tránsito</title>
    </head>

    <body>
        <h1>Distribución de fechas de Licencias</h1>

        <form method="POST" action="distr_calc.php">
            <h3>Tipo de Licencia:</h3>
            <select id="tipo_lic" name="licencia">
                <option value="profesional">Profesional</option>
                <option value="no_profesional">No Profesional</option>
            </select>

            <h3>Control Restringido: </h3>
            <select id="restriccion" name="restriccion">
                <option value="no">No</option>
                <option value="si">Si</option>
            </select>

            <h3>Años de Control Restringido (Médico o Antecedente): </h3>
            <select id="a_c_restr" name="a_c_restr">
                <option value="0">Sin Restricción</option>
                <option value="0,5">6 Meses</option>
                <option value="1">1 Año</option>
                <option value="2">2 Años</option>
                <option value="3">3 Años</option>
                <option value="4">4 Años</option>
                <option value="5">5 Años</option>
            </select>

            <h3>Fecha de Nacimiento:</h3>
            <input type="date" name="f_nacimiento" />

            <h3>Fecha de Ultimo Control: </h3>
            <input type="date" name="f_ultimocontrol" />

            <h3>Fecha de Examen Médico: </h3>
            <input type="date" name="f_examen" />

            <input type="submit">

            <br><br><h3>Copyright 2024, Roberto Ahumada R. </h3>;
        </form>

    </body>
</html>