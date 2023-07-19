<?php
    include ('db.php');

    $query = "SELECT medico FROM datos_cirugia GROUP BY medico";

    $result = $conexion->query($query);
    if ($result->num_rows > 0) {

        $medicos = array();
        while ($fila = $result->fetch_assoc()) {
            $medicos[] = $fila["medico"];
        }};

    $sala = "SELECT sala FROM datos_cirugia GROUP BY sala";

    $result11 = $conexion->query($sala);
    if ($result11->num_rows > 0) {

        $salas = array();
        while ($fila = $result11->fetch_assoc()) {
            $salas[] = $fila["sala"];
        }};


    $u_salas= "SELECT COUNT(*) as usosalas FROM datos_cirugia GROUP BY sala";

    $result11 = $conexion->query($u_salas);
    if ($result11->num_rows > 0){
        $usoSalas = array();
        while ($fila = $result11->fetch_assoc()){
            $usoSalas[] = $fila["usosalas"];
        }
    };

    $programadoInicio="SELECT SEC_TO_TIME(AVG(TIME_TO_SEC(tiempos.programada_inicio))) AS promedioInicio_horas
    FROM datos_cirugia
    JOIN tiempos ON datos_cirugia.id_cirugia = tiempos.id_cirugia GROUP BY medico";

    $result10 = $conexion ->query($programadoInicio);
    if($result10->num_rows > 0){
        $PIni = array();
        while($fila=$result10->fetch_assoc()){
            $PIni[]=$fila["promedioInicio_horas"];
        }
    };

    $ingresoEgreso= "SELECT SEC_TO_TIME(AVG(TIME_TO_SEC(tiempos.ingreso_egreso))) AS promedio_horas
    FROM datos_cirugia
    JOIN tiempos ON datos_cirugia.id_cirugia = tiempos.id_cirugia GROUP BY medico";

    $result2 = $conexion->query($ingresoEgreso);
    if ($result2->num_rows > 0){
        $IE = array();
        while ($fila = $result2->fetch_assoc()){
            $IE[] = $fila["promedio_horas"];
        }
    };

    $ingresoAnestecia="SELECT SEC_TO_TIME(AVG(TIME_TO_SEC(tiempos.ingreso_anestesia))) AS promedio_anestesia
    FROM datos_cirugia
    JOIN tiempos ON datos_cirugia.id_cirugia = tiempos.id_cirugia GROUP BY medico";

    $result3 = $conexion ->query($ingresoAnestecia);
    if($result3->num_rows > 0){
        $IA = array();
        while($fila=$result3->fetch_assoc()){
            $IA[]=$fila["promedio_anestesia"];
        }
    };


    $ingresoInicio = "SELECT medico,SEC_TO_TIME(AVG(TIME_TO_SEC(tiempos.ingreso_inicio))) AS promedio_inicio
    FROM datos_cirugia
    JOIN tiempos ON datos_cirugia.id_cirugia = tiempos.id_cirugia GROUP BY medico";

    $result4 = $conexion ->query($ingresoInicio);
    if($result4->num_rows > 0){
        $II = array();
        while($fila=$result4->fetch_assoc()){
            $II[]=$fila["promedio_inicio"];
        }
    };

    $inicioFin ="SELECT SEC_TO_TIME(AVG(TIME_TO_SEC(tiempos.inicio_fin))) AS promedio_fin
    FROM datos_cirugia
    JOIN tiempos ON datos_cirugia.id_cirugia = tiempos.id_cirugia GROUP BY medico";

    $result5 = $conexion ->query($inicioFin);
    if($result5->num_rows > 0){
        $IF = array();
        while($fila=$result5->fetch_assoc()){
            $IF[]=$fila["promedio_fin"];
        }
    };

    $contador= "SELECT medico, COUNT(*) AS total_cirugias FROM datos_cirugia GROUP BY medico";
    $result6 = $conexion ->query($contador);
    if($result6->num_rows > 0){
        $cont = array();
        while($fila=$result6->fetch_assoc()){
            $cont[]=$fila["total_cirugias"];
        }
    };


    $query2 = "SELECT dc.medico AS  medico FROM datos_cirugia dc
    JOIN cancelaciones c ON dc.id_cirugia = c.id_cirugia WHERE c.suspencion='si' GROUP BY dc.medico";

    $result7 = $conexion->query($query2);
    if ($result7->num_rows > 0) {

        $S_medicos = array();
        while ($fila = $result7->fetch_assoc()) {
            $S_medicos[] = $fila["medico"];
        }};

    $suspenciones= "SELECT COUNT(c.suspencion) AS suspenciones FROM datos_cirugia dc
    JOIN cancelaciones c ON dc.id_cirugia = c.id_cirugia WHERE c.suspencion='si' GROUP BY dc.medico";

    $result8 = $conexion->query($suspenciones);
    if ($result8->num_rows > 0){
        $susp = array();
        while ($fila = $result8->fetch_assoc()){
            $susp[] = $fila["suspenciones"];
        }
    };








    
    $medicos = json_encode($medicos);
    $salas = json_encode($salas);
    $usoSalas = json_encode($usoSalas);
    $PIni = json_encode($PIni);
    $IE = json_encode($IE);
    $IA = json_encode($IA);
    $II = json_encode($II);
    $IF = json_encode($IF);
    $cont = json_encode($cont);
    $S_medicos = json_encode($S_medicos);
    $susp = json_encode($susp);


    $conexion->close();

?>