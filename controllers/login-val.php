
<?php
    require_once '../DB/conexion.php';

    if (isset($_POST)) {
        $id = $_POST['user_id'];
        $pass = $_POST['user_pass'];
        
        $sql = "SELECT * FROM Usuario WHERE id_usuario = '$id' AND password = '$pass'";
        $prepare = sqlsrv_prepare($conn, $sql);

       $stm = sqlsrv_query($conn, $sql, array(), array( "Scrollable" => 'static' ));
        if (sqlsrv_execute($prepare)) {

            if(sqlsrv_num_rows($stm) === 1) {
                while ($u = sqlsrv_fetch_array($prepare)) {
                    $_SESSION['user'] = $u['id_usuario'];
                    var_dump($_SESSION['user']);
                }
           }else{
            echo "<script>setTimeout(() => {  alert('Error'); }, 2000);</script>";
           }
        } else {
            echo "<script>setTimeout(() => {  alert('Error'); }, 2000);</script>";
            $_SESSION['error_login'] = 'Login incorrecto';
        }
    }
    header('Location: ../index.php');
    
?>