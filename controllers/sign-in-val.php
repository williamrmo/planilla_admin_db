<?php

require_once '../DB/conexion.php';

if (isset($_POST)) {
    $id = $_POST['user_id'];
    $pass = $_POST['user_password'];
    $nombre = $_POST['user_name'];
    $priApe = $_POST['user_1_last_name'];
    $segApe = $_POST['user_2_last_name'];
    $country = $_POST['user_country'];
    $direc = $_POST['user_direction'];
    $phone = $_POST['user_phone'];
    
    $sql = "SELECT * FROM Usuario WHERE id_usuario = '$id'";
    $prepare = sqlsrv_prepare($conn, $sql);


    
   $stm = sqlsrv_query($conn, $sql, array(), array( "Scrollable" => 'static' ));
    if (sqlsrv_execute($prepare)) {

        if(sqlsrv_num_rows($stm) === 0) {
            echo 'no hay concidencias';
            $insert = "exec nuevoEmpleado '$id', '$nombre', '$priApe', '$segApe', 
            '$pass', '$country', '$direc', '$phone'";
            $prepare = sqlsrv_prepare($conn, $insert);
            if (sqlsrv_execute($prepare)) {
                echo 'usuario registrado';
            }else{
                echo 'error';
            }
       }
    } else {
        echo "<script>alert('Error')</script>";
        $_SESSION['error_login'] = 'Login incorrecto';
        
    }
}
header('Location: ../index.php');
?>