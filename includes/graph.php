<?php
    include ('db.php');

    $query = "SELECT medico, COUNT(*) AS total_cirugias FROM datos_cirugia GROUP BY medico";

    $result = $conexion->query($query);
    $data = array(
        array('Médico', 'Total de cirugías')
    );
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = array($row['medico'], intval($row['total_cirugias']));
        }
    }
    $data_json = json_encode($data);
    $conexion->close();

?>