<?php

require_once '../DB/conexion.php';

if (isset($_POST)) {
    $id = $_POST['id'];
    $direc = $_POST['direc'];
    $sql = "update Usuario set direccion = '$direc' where id_usuario = '$id'";
    $prepare = sqlsrv_prepare($conn, $sql);

    var_dump($sql);

    if (sqlsrv_execute($prepare)) {

        echo "<script>alert('OK')</script>";
    } else {
        echo "<script>alert('Error')</script>";
    }
}
    header('Location: ../my-perfil.php');
?>