<html>
    <head>
        <title>Distribución de Tránsito</title>
    </head>

    <body>
        <h1>Distribución de fechas de Licencias</h1>


        <h3>Iipo de Licencia:</h3>
        <select id="tipo_lic" name="licencia">
            <option value="profesional">Profesional</option>
            <option value="no_profesional">No Profesional</option>
        </select>

        <h3>Control Restringido: </h3>
        <select id="restriccion" name="restriccion">
            <option value="no">No</option>
            <option value="si">Si</option>
        </select>

        <h3>Fecha de Nacimiento:</h3>
        <input type="date" name="f_otorgamiento" />

        <h3>Fecha de Ultimo Control: </h3>
        <input type="date" name="f_ultimocontrol" />



        <p><button>Submit</button></p>
    </body>
</html>