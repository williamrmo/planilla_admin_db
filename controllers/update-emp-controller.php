<?php

require_once '../DB/conexion.php';

if (isset($_POST)) {
    $id =  $_SESSION['id_update'];
    if($_POST['user_aso'] == 'Activo_aso') {
        $user_aso = 1;
    }else {
        $user_aso = 0;
    }
    $salario = $_POST['user_salario'];
    $user_cuenta = $_POST['user_cuenta'];
    $user_puesto = $_POST['user_puesto'];
    $user_estado = $_POST['user_estado'];
    $user_permiso = $_POST['user_permiso'];
    
    $sql = "SELECT * FROM Usuario WHERE id_usuario = '$id'";
    $prepare = sqlsrv_prepare($conn, $sql);


    
   $stm = sqlsrv_query($conn, $sql, array(), array( "Scrollable" => 'static' ));
    if (sqlsrv_execute($prepare)) {

        if(sqlsrv_num_rows($stm) === 1) {
            echo 'no hay concidencias';
            $insert = "exec MantenimientoUsuario 1, '$id', '$salario', $user_aso, '$user_cuenta', 
                '$user_puesto', $user_estado, '$user_permiso'";

                echo $insert;
            $prepare = sqlsrv_prepare($conn, $insert);
            if (sqlsrv_execute($prepare)) {
                echo 'usuario actualizado';
            }else{
                echo 'error';
            }
       }
    } else {
        echo "<script>alert('Error')</script>";
        $_SESSION['error_login'] = 'Login incorrecto';
        
    }
}
header('Location: ../gestionar-empleado.php');
?>