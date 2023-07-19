<?php
    include('includes/graph.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Metricas de cirugia Ambulatoria</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="css/styles_graph.css">

</head>
<body>
    <h1 >Metricas</h1>
    <form action="index.php" method="POST">
        <input type="submit" value="Volver">
    </form>
    <div class="chart-container">
        <div>
            <canvas id="usoSalas"></canvas>
        </div>
    
        <div>
            <canvas id="programadainicio"></canvas>
        </div>
        <div>
            <canvas id="ingresoEgreso"></canvas>
        </div>
        
        <div>
            <canvas id="ingresoAnestecia"></canvas>
        </div>
    
        <div>
            <canvas id="ingresoInicio"></canvas>
        </div>
    
        <div>
            <canvas id="inicioFin"></canvas>
        </div>
        
        <div>
            <canvas id="cirugiasT"></canvas>
        </div>
    
        <div>
            <canvas id="suspenciones"></canvas>
        </div>

    </div>

    
    <script>
        // Función para convertir el tiempo en minutos
        const convertToMinutes=(time)=> {
            if (time.includes(":")) {
                var splitTime = time.split(":");
                var hours = parseInt(splitTime[0]);
                var minutes = parseInt(splitTime[1]);
                return hours * 60 + minutes;
            } else {
                return parseInt(time);
            }
        }

        // consultas
        const medicos = <?php echo $medicos; ?>;
        const salas =<?php echo $salas; ?>;

        const usoSalas =<?php echo $usoSalas; ?>;
        const horasPIni = <?php echo $PIni; ?>;
        const horasIE = <?php echo $IE; ?>;
        const horasIA = <?php echo $IA; ?>;
        const horasII = <?php echo $II; ?>;
        const horasIF = <?php echo $IF; ?>;

        const cirugiasT = <?php echo $cont;?>;
        const S_medicos = <?php echo $S_medicos;?>;
        const suspenciones = <?php echo $susp; ?>;

        // conversiones
        const horasConvertidosPIni = horasPIni.map(convertToMinutes);
        const horasConvertidosIE = horasIE.map(convertToMinutes);
        const horasConvertidosIA = horasIA.map(convertToMinutes);
        const horasConvertidosII = horasII.map(convertToMinutes);
        const horasConvertidosIF = horasIF.map(convertToMinutes);
        

        var coloresBarras = ["rgb(45, 3, 59)", "rgb(129, 12, 168)", "rgb(193, 71, 233)", "rgb(229, 184, 244)"];


        // Datos del primer gráfico
        var dataSalas = {
            labels: salas,
            datasets: [{
                label: "Usos de sala",
                data: usoSalas,
                backgroundColor: coloresBarras,
                borderColor: "rgba(0,0,0,0)",
                borderWidth: 1
            }]
        };
        // Datos del segundo gráfico
        var dataPIni = {
            labels : medicos,
            datasets: [{
                label: "Hora programada - Inicio Cirugía",
                data: horasConvertidosPIni,
                backgroundColor: coloresBarras,
                borderColor: "rgba(0,0,0,0)",
                borderWidth: 1
            }]
        };
        // Datos del tercero gráfico
        var dataIE = {
            labels: medicos,
            datasets: [{
                label: "Ingreso a Sala - Egreso de Sala",
                data: horasConvertidosIE,
                backgroundColor: coloresBarras,
                borderColor: "rgba(0,0,0,0)",
                borderWidth: 1
            }]
        };

        // Datos del cuarto gráfico
        var dataIA = {
            labels: medicos,
            datasets: [{
                label: "Ingreso a Sala - Inicio Anestesia",
                data: horasConvertidosIA,
                backgroundColor: coloresBarras,
                borderColor: "rgba(0,0,0,0)",
                borderWidth: 1
            }]
        };
        // Datos del quinto gráfico
        var dataII = {
            labels: medicos,
            datasets: [{
                label: "Ingreso a Sala - Inicio Anestesia",
                data: horasConvertidosII,
                backgroundColor: coloresBarras,
                borderColor: "rgba(0,0,0,0)",
                borderWidth: 1
            }]
        };
        // Datos del sexto gráfico
        var dataIF = {
            labels : medicos,
            datasets: [{
                label: "Inicio - Fin Cirugía",
                data: horasConvertidosIF,
                backgroundColor: coloresBarras,
                borderColor: "rgba(0,0,0,0)",
                borderWidth: 1
            }]
        };
        // Crear el gráfico de cirugias totales
        var dataCont = {
            labels : medicos,
            datasets: [{
                label: "Cirugías por Médico",
                data: cirugiasT,
                backgroundColor: coloresBarras,
                borderColor: "rgba(0,0,0,0)",
                borderWidth: 1
            }]
        };
        // Crear el gráfico de suspenciones
        var dataSusp = {
            labels : S_medicos,
            datasets: [{
                label: "Suspenciones",
                data: suspenciones,
                backgroundColor: coloresBarras,
                borderColor: "rgba(0,0,0,0)",
                borderWidth: 1
            }]
        };


        // Opciones comunes para los 6 primeos gráficos
        const optionshr = {
            
            indexAxis: 'y',
            scales: {
                x: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: "Minutos"
                    }
                }
            },
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function (context) {
                            var value = context.raw;
                            var hours = Math.floor(value / 60);
                            var minutes = value % 60;
                            var label = "";
                            if (hours > 0) {
                                label += hours + "hr ";
                            }
                            if (minutes > 0) {
                                label += minutes + "min";
                            }
                            return label;
                        }
                    }
                }
            }
        };


        const options = {
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: "Cirugias Totales" // Etiqueta del eje Y
                    }
                }
            }
        };
        
        // Crear el primer gráfico
        var ctxsalas = document.getElementById("usoSalas").getContext("2d");
        var ctxsalas = new Chart(ctxsalas, {
            type: "bar",
            data: dataSalas,
            options: options
        });
        // Crear el segundo gráfico
        var ctxPIni = document.getElementById("programadainicio").getContext("2d");
        var ctxPIni =new Chart(ctxPIni,{
            type: "bar",
            data : dataPIni,
            options: optionshr
        });
        
        // Crear el tercero gráfico
        var ctxIE = document.getElementById("ingresoEgreso").getContext("2d");
        var chartIE = new Chart(ctxIE, {
            type: "bar",
            data: dataIE,
            options: optionshr
        });

        // Crear el cuarto gráfico
        var ctxIA = document.getElementById("ingresoAnestecia").getContext("2d");
        var chartIA = new Chart(ctxIA, {
            type: "bar",
            data: dataIA,
            options: optionshr
        });

        // Crear el quinto gráfico
        var ctxII = document.getElementById("ingresoInicio").getContext("2d");
        var chartII = new Chart(ctxII, {
            type: "bar",
            data: dataII,
            options: optionshr
        });
        // Crear el sexto gráfico
        var ctxIF = document.getElementById("inicioFin").getContext("2d");
        var chartIF =new Chart(ctxIF,{
            type: "bar",
            data : dataIF,
            options: optionshr
        });

        // cirugias totales y suspenciones
        var ctxcont = document.getElementById("cirugiasT").getContext("2d");
        var ctxcont =new Chart(ctxcont,{
            type: "bar",
            data : dataCont,
            options: options
        });

        var ctxsusp = document.getElementById("suspenciones").getContext("2d");
        var ctxsusp =new Chart(ctxsusp,{
            type: "bar",
            data : dataSusp,
            options: options
        });

    </script>
</body>
</html>

