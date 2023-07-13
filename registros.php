<?php
    include('includes/db.php');
    $conexion=mysqli_connect($host,$user,$password,$database);
    $query = "SELECT dc.*, t.*, c.* FROM datos_cirugia dc
    JOIN tiempos t ON dc.id_cirugia = t.id_cirugia
    JOIN cancelaciones c ON dc.id_cirugia = c.id_cirugia";
    $resultado = mysqli_query($conexion, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles_re.css">
</head>
<body>
    <h1>Registro</h1>

    <table>
        <thead>
            <tr>
                <th>Médico</th>
                <th>Cirugía</th>
                <th>Sala</th>
                <th>Diagnóstico</th>
                <th>Fecha</th>
                <th>Hora programada</th>
                <th>Hora Ingreso a Sala</th>
                <th>Hora Anestesia</th>
                <th>Hora Inicio Cirugía</th>
                <th>Hora Fin Cirugía</th>
                <th>Hora Egreso Sala</th>
                <th>Hora programada - Ingreso</th>
                <th>Ingreso - Egreso Sala</th>
                <th>Ingreso - Inicio Anestesia</th>
                <th>Ingreso Sala - Inicio Cirugía</th>
                <th>Ingreso Inicio - Fin Cirugía</th>
                <th>Cirugía Suspendida</th>
                <th>Medico</th>
                <th>Motivo</th>
            </tr>
        </thead>
        <tbody id="table-body">
        <?php
            while ($fila = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                echo "<td>" . $fila['medico'] . "</td>";
                echo "<td>" . $fila['cirugia'] . "</td>";
                echo "<td>" . $fila['sala'] . "</td>";
                echo "<td>" . $fila['diagnostico'] . "</td>";
                echo "<td>" . $fila['fecha'] . "</td>";
                echo "<td>" . $fila['programada'] . "</td>";
                echo "<td>" . $fila['ingreso'] . "</td>";
                echo "<td>" . $fila['anestesia'] . "</td>";
                echo "<td>" . $fila['inicio'] . "</td>";
                echo "<td>" . $fila['fin'] . "</td>";
                echo "<td>" . $fila['egreso'] . "</td>";
                echo "<td>" . $fila['programada_ingreso'] . "</td>";
                echo "<td>" . $fila['ingreso_egreso'] . "</td>";
                echo "<td>" . $fila['ingreso_anestesia'] . "</td>";
                echo "<td>" . $fila['ingreso_inicio'] . "</td>";
                echo "<td>" . $fila['inicio_fin'] . "</td>";
                echo "<td>" . $fila['suspencion'] . "</td>";
                echo "<td>" . $fila['S_medico'] . "</td>";
                echo "<td>" . $fila['motivo'] . "</td>";
                echo "</tr>";
            }
        ?>
        </tbody>

        <form action="index.php" method="POST">
            <input type="submit" value="Volver">
        </form>

        <form action="includes/export.php" method="POST">
            <input type="submit" value="Exportar a Excel">
        </form>

        <br><br>

        <input type="text" id="search-input" placeholder="Buscar">




    </table>
</body>
<script src="js/buscador.js"></script>
</html>