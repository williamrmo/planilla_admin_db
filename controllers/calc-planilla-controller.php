<?php

require_once '../DB/conexion.php';

if (isset($_POST)) {

    //  Eliminar datos de la planilla temp
    $sql_del = "delete Planilla_tmp";

    $prepare_del = sqlsrv_prepare($conn, $sql_del);


    if (sqlsrv_execute($prepare_del)) {

        echo "<script>alert('OK delete')</script>";
    } else {
        echo "<script>alert('Error delete')</script>";
    }

    //  Calcular planilla

    $sql = "exec CalcularPlanilla";
    var_dump($sql);
    $prepare2 = sqlsrv_prepare($conn, $sql);

    if (sqlsrv_execute($prepare2)) {

        echo "<script>alert('OK calculo')</script>";
    } else {
        echo "<script>alert('Error calculo')</script>";
    }
}
header('Location: ../aprobar-planilla.php');
?>