<?php

require_once '../DB/conexion.php';

if (isset($_POST)) {
    $sql = "exec mantenimientoPlanilla 2";
    $prepare = sqlsrv_prepare($conn, $sql);

    $stm = sqlsrv_query($conn, $sql, array(), array( "Scrollable" => 'static' ));

    if (sqlsrv_execute($prepare)) {

        echo "<script>alert('OK')</script>";
    } else {
        echo "<script>alert('Error')</script>";
    }
}
header('Location: ../registros-planilla.php');
?>