<?php

require_once '../DB/conexion.php';

if (isset($_POST)) {
    $id = $_POST['id'];
    $incapacidad = $_POST['incapacidad'];
    $banco = $_POST['banco'];
    $ccss = $_POST['ccss'];
    var_dump($id);
    $sql = "exec mantenimientoPlanilla 1, '$id', $incapacidad, $banco, $ccss, 1";

    $prepare = sqlsrv_prepare($conn, $sql);

    $stm = sqlsrv_query($conn, $sql, array(), array( "Scrollable" => 'static' ));

    if (sqlsrv_execute($prepare)) {

        echo "<script>alert('OK')</script>";
    } else {
        echo "<script>alert('Error')</script>";
    }
}
header('Location: ../gestinar-planilla.php');
?>