<?php

require_once '../DB/conexion.php';

if (isset($_POST)) {
    
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $desc = $_POST['descripcion'];
    $min = $_POST['sal_min'];
    $max = $_POST['sal_max'];
    $est = $_POST['estudios'];
    $dep = $_POST['depa'];

    //var_dump($id);
    if (strcmp($id, "0") === 0 || strcmp($id, "") === 0 ) {
        $id = 0;
    }
    
    if (strcmp($nombre, "") === 0 ) {
        $nombre = 'null';
    }
    else {
        $nombre = "'$nombre'";
    }

    if (strcmp($desc, "") === 0 ) {
        $desc = 'null';
    }
    else {
        $desc = "'$desc'";
    }

    if (strcmp($min, "0") === 0 || strcmp($min, "") === 0 ) {
        $min = 'null';
    }

    if (strcmp($max, "0") === 0 || strcmp($max, "") === 0 ) {
        $max = 'null';
    }

    if (strcmp($est, "0") === 0 || strcmp($est, "") === 0 ) {
        $est = 'null';
    }

    if (strcmp($dep, "0") === 0 || strcmp($dep, "") === 0 ) {
        $dep = 'null';
    }

    $sql = "exec MantenimietoPuesto $id, $nombre, $desc, $min, $max, $est, $dep";
    
    var_dump($sql);
    
    $prepare = sqlsrv_prepare($conn, $sql);


    if (sqlsrv_execute($prepare)) {

        

    } else {
        echo "<script>alert('Error')</script>";
        
    }
}
header('Location: ../gestionar-empleado.php');
?>