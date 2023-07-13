<?php
// Configuración de la conexión a la base de datos


$servername = "localhost";
$username = "root";
$password = "";
$database = "ambulatoria";

// Crear una conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar si hay errores de conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta SQL
$query = "SELECT medico, COUNT(*) AS total_cirugias FROM datos_cirugia GROUP BY medico";

// Ejecutar la consulta
$result = $conn->query($query);

// Crear un array para almacenar los datos del gráfico
$data = array(
    array('Médico', 'Total de cirugías')
);

// Verificar si se obtuvieron resultados
if ($result->num_rows > 0) {
    // Recorrer los resultados y agregarlos al array de datos
    while ($row = $result->fetch_assoc()) {
        $data[] = array($row['medico'], intval($row['total_cirugias']));
    }
}

// Convertir el array de datos a formato JSON
$data_json = json_encode($data);

// Cerrar la conexión
$conn->close();
?>

<html>
  <head>
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
  </body>
</html>
