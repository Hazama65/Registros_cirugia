<?php
require '../vendor/autoload.php'; // Ruta al archivo autoload.php de PhpSpreadsheet

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Incluir el código de conexión a la base de datos y la consulta SQL

include('db.php');
$conexion = mysqli_connect($host, $user, $password, $database);
$query = "SELECT dc.*, t.*, c.* FROM datos_cirugia dc
    JOIN tiempos t ON dc.id_cirugia = t.id_cirugia
    JOIN cancelaciones c ON dc.id_cirugia = c.id_cirugia";
$resultado = mysqli_query($conexion, $query);

// Crear un nuevo libro de Excel y seleccionar la hoja de cálculo activa
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Definir los encabezados de las columnas en la hoja de cálculo
$columnas = array(
    'IDcirugia',
    'Médico',
    'Cirugía',
    'Sala',
    'Diagnóstico',
    'Fecha',
    'Hora Programada',
    'Hora Ingreso a Sala',
    'Hora Anestesia',
    'Hora Inicio Cirugía',
    'Hora Fin Cirugía',
    'Hora Egreso Sala',
    'Programada - Ingreso',
    'Programada - Inicio',
    'Ingreso - Egreso Sala',
    'Ingreso - Inicio Anestesia',
    'Ingreso Sala - Inicio Cirugía',
    'Ingreso Inicio - Fin Cirugía',
    'Cirugía Suspendida',
    'S medico',
    'Motivo'
);

// Agregar los encabezados de las columnas a la hoja de cálculo
$columnIndex = 1;
foreach ($columnas as $columna) {
    $sheet->setCellValueByColumnAndRow($columnIndex, 1, $columna);
    $columnIndex++;
}

// Agregar los datos a la hoja de cálculo
$fila = 2;
while ($datos = mysqli_fetch_assoc($resultado)) {
    $columnIndex = 1;
    foreach ($datos as $valor) {
        $sheet->setCellValueByColumnAndRow($columnIndex, $fila, $valor);
        $columnIndex++;
    }
    $fila++;
}

// Configurar el encabezado HTTP para descargar el archivo Excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="datos_cirugia.xlsx"');
header('Cache-Control: max-age=0');

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
    
?>