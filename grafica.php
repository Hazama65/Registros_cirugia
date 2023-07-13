<?php
    include('includes/graph.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            // Convertir el JSON de datos a un objeto de datos
            var jsonData = <?php echo $data_json; ?>;
            var data = google.visualization.arrayToDataTable(jsonData);

            var options = {
            chart: {
                title: 'Total de cirugías por médico',
                subtitle: 'Datos obtenidos de la base de datos',
            },
            bars: 'vertical' // Required for Material Bar Charts.
            };

            var chart = new google.charts.Bar(document.getElementById('barchart_material'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>
</head>
<body>
    <div id="barchart_material" style="width: 900px; height: 500px;"></div>
    <form action="index.php" method="POST">
        <input type="submit" value="Volver">
    </form>
</body>
</html>

