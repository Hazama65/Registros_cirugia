<?php
    include('db.php');

    $conexion=mysqli_connect($host,$user,$password,$database);

    if(isset($_POST['enviar'])){

        if(strlen($_POST['medico'])>=1 && strlen($_POST['cirugia'])>=1 && strlen($_POST['sala'])>=1
        && strlen($_POST['diagnostico'])>=1 && strlen($_POST['fecha'])>=1){

                $medico = trim($_POST['medico']);
                $cirugia = trim($_POST['cirugia']);
                $sala = trim($_POST['sala']);
                $diagnostico = trim($_POST['diagnostico']);
                $fecha = trim($_POST['fecha']);

                $insertar = "INSERT INTO datos_cirugia (medico,cirugia,sala,diagnostico,fecha) VALUES 
                ('$medico','$cirugia','$sala','$diagnostico','$fecha')";

                mysqli_query($conexion,$insertar);
                $ultimoId = mysqli_insert_id($conexion);

                $programada = trim($_POST['programado']);
                $ingreso = trim($_POST['ingreso']);
                $anestesia = trim($_POST['anestesia']);
                $inicio = trim($_POST['inicio']);
                $fin = trim($_POST['fin']);
                $egreso = trim($_POST['egreso']);

                $pro_ingreso = trim($_POST['pro_ingreso']);
                $ingreso_egreso = trim($_POST['ingreso_egreso']);
                $ingreso_anestesia = trim($_POST['ingreso_anestesia']);
                $ingreso_inicio = trim($_POST['ingreso_inicio']);
                $inicio_fin = trim($_POST['inicio_fin']);

                $horas =  "INSERT INTO tiempos 
                VALUES ('$programada', '$ingreso', '$anestesia', '$inicio', '$fin', '$egreso', '$pro_ingreso', '$ingreso_egreso', '$ingreso_anestesia', '$ingreso_inicio', '$inicio_fin','$ultimoId')";
                
                mysqli_query($conexion,$horas);


                $suspendida = trim($_POST['suspendida']);
                $S_medico = trim($_POST['S_medico']);
                $motivo = trim($_POST['motivo']); 

                $suspenciones = "INSERT INTO cancelaciones VALUES ('$suspendida','$S_medico','$motivo','$ultimoId')";
                mysqli_query($conexion,$suspenciones);

                echo '<script>
                    alert("Registro exitoso");window.location.href = "../index.php";
                </script>';

                mysqli_close($conexion);



    }
}
?>