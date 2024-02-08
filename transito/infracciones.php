
<html>
  <title>Ingreso de Infracciones</title>

<body>
    <form method="POST" action="infracciones_res.php">
        <h3>Tipo Sentencia:</h3>
            <select id="sentencia" name="sentencia">
                <option value="Multa impaga">Multa impaga</option>
                <option value="Sentencia dictada">Sentencia dictada</option>
                <option value="Suspensión dictada">Suspensión dictada</option>
                <option value="Sentencia pendiente">Tribunal de Familia</option>
            </select>

        <h3>Tribunal: </h3>
            <select id="tribunal" name="tribunal">
                <option value="J.P.L.">J. Policia Local</option>
                <option value="J. Garantía">J. Garantia</option>
                <option value="Fiscalia">Fiscalia</option>
                <option value="Juzgado de Familia">Tribunal de Familia</option>
            </select>

        <h4>Comuna: 
            <input type="text" name="comuna" /> </h4>

        <h4>N° de Causa: 
            <input type="text" name="n_causa" /> </h4>

        <h4>Motivo: 
            <input type="text" name="motivo" /> </h4>
        
        <h4>Placa Patente Única:
            <input type="text" name="ppu" /> </h4>

        <h4>Marca:
            <input type="text" name="marca" /> </h4>

        <h4>Fecha y hora de Infracción:
            <input type="datetime" name="fecha_inf" /> </h4>

        <h4>Fecha de Citación:
            <input type="date" name="fecha_cit" /> </h4>

        <h4>Multa:
            <input type="text" name="multa" /> </h4>

        <input type="submit">

    <br><br><h3>Copyright 2024, Roberto Ahumada R. </h3>

</body>


</html>
