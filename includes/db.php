<?php
    $host="localhost";
    $user="root";
    $password="";
    $database="ambulatoria";


    $conexion=mysqli_connect($host,$user,$password,$database);

    if (!$conexion){
        echo "Error en la conexion a la base de datos";
    }
?>