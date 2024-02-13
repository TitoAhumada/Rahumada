<html>
  <title>Reserva Interna de Horas - Dpto. de Tránsito</title>

<body>

    <h1>Reserva Interna de Horas</h1>
    <h4>Departamento de Tránsito y Transporte Público</h4>
    <h4>Ilustre Municipalidad de Ovalle</h4>

    <form>
        <h3>Tipo de Trámite: </h3>
        <select id="tipo_tramite" name="tipo_tramite" required>
            <option value="">Selecciona un tipo de trámite</option>
            <option value="p_licencia">Primera Licencia</option>
            <option value="ampliacion">Cambio/Agregar Clase</option>
            <option value="renovacion">Renovación</option>
            <option value="renovacion_exp">Renovación vencidas o prorrogadas</option>
        </select>

        <button type="submit">Siguiente</button>

        <a href="agenda_web.php" target="_blank" title="Ver Agenda">Mostrar agenda</a>
    </form>

</body>


</html>
