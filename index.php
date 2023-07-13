<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Cirugia Ambulatoria</title>
    <link rel="stylesheet" href="css/styles_index.css">
</head>
<body>
    <h1>Formulario de ejemplo</h1>

    <form action="includes/insert.php" method="POST" autocomplete="off">

    <h3>Datos de la cirugia</h3>

        <!-- datos de la cirugia -->
        <label for="medico">Medico:</label>
        <input type="text" id="medico" name="medico" required>

        <label for="cirugia">Cirugia:</label>
        <input type="text" id="cirugia" name="cirugia" required>

        <label for="sala">Sala:</label>
        <input type="text" id="sala" name="sala" required>

        <label for="diagnostico">Diagnostico:</label>
        <input type="text" id="diagnostico" name="diagnostico" required>

        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha" require><br><br>

        <!-- datos de ingreso-egreso -->

        <label for="programado">Hora Programda</label>
        <input type="time" name="programado" id="programado">

        <label for="ingreso">Hora Ingreso a Sala</label>
        <input type="time" name="ingreso" id="ingreso">

        <label for="anestesia">Hora Anestesia</label>
        <input type="time" name="anestesia" id="anestesia">

        <label for="inicio">Hora Inicio Cirugía</label>
        <input type="time" name="inicio" id="inicio">

        <label for="fin">Hora Fin Cirugía</label>
        <input type="time" name="fin" id="fin">
        
        <label for="egreso">Hora Egreso Sala</label>
        <input type="time" name="egreso" id="egreso"><br><br>

        <!-- Calculo de los tiempos -->

        <label for="pro_ingreso">Programda - Ingreso Sala</label>
        <input type="text" name="pro_ingreso" id="pro_ingreso"  readonly >

        <label for="ingreso_egreso">Ingreso - Egreso Sala</label>
        <input type="text" name="ingreso_egreso" id="ingreso_egreso"  readonly>

        <label for="ingreso_anestesia">Ingreso - Inicio Anestesia</label>
        <input type="text" name="ingreso_anestesia" id="ingreso_anestesia"  readonly>

        <label for="ingreso_inicio">Ingreso Sala - Inicio Cirugía</label>
        <input type="text" name="ingreso_inicio" id="ingreso_inicio"  readonly><br>
        
        <label for="inicio_fin">Ingreso Inicio - Fin Cirugía</label>
        <input type="text" name="inicio_fin" id="inicio_fin" readonly ><br>

        <!-- datos de cancelacion -->

        <h3>Cirugia cancelada</h3>

        <label for="suspendida">Cirugía Suspendida:</label>
        <select name="suspendida" id="suspendida">
            <option value="No">No</option>
            <option value="Si">Si</option>
        </select>

        <label for="S_medico">Medico:</label>
        <input type="text" id="S_medico" name="S_medico" >

        <label for="motivo">Motivo:</label>
        <input type="text" id="motivo" name="motivo" > <br> <br>


        <input type="submit" value="Enviar" name="enviar">
        <input type="button" value="Limpiar" onclick="limpiarCampos()"> <br><br>
    </form>
    <form action="registros.php" method="POST">
        <input type="submit" value="Registros">
    </form>
    <form action="grafica.php" method="POST">
        <input type="submit" value="Grafico">
    </form>

</body>

<script src="js/calculohoras.js"></script>
<script src="js/limpiarCampos.js"></script>
</html>



