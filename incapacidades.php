<?php session_start(); ?>
  <nav>
    <?php include_once './components/nav.php'; ?>
  </nav>

  <div class="container">
  <article>
    <h1>Gestionar incapacidades</h1>
    <br>

    <form action="" method="get">
      <label for="id_user">
        Identificacion: <br>
        <input type="number" name="id_user" id="id_user">
      </label>
      <br><br>
      <input type="submit" value="buscar" class="btn btn-primary">
    </form>
    
  <?php
    if(isset($_GET['id_user'])){
      $id = $_GET['id_user'];
      include_once 'DB/conexion.php';

      $sql = "select * from Usuario where id_usuario = '$id'";
      $prepare = sqlsrv_prepare($conn, $sql);
                
      $stm = sqlsrv_query($conn, $sql, array(), array( "Scrollable" => 'static' ));
      
      if (sqlsrv_execute($prepare)) {

        if(sqlsrv_num_rows($stm) != 0) {
          echo '
                <form  method="post">
                  <h3>Ingresar Incapacidad</h3>
                  <br>
                  <label for="fecha_inicio">
                    Fecha de inicio: <br>
                    <input type="date" name="fecha_inicio" id="fecha_inicio" required>
                  </label>
                  <br>
                  <label for="fecha_fin">
                    Fecha de conclusion: <br>
                    <input type="date" name="fecha_fin" id="fecha_fin" required>
                  </label>
                  <br><br>
                  <input type="submit" value="Guardar" class="btn btn-success">
                <form>';
          if(isset($_POST['fecha_inicio']) && isset($_POST['fecha_fin']) ){
            $f_i = $_POST['fecha_inicio'];
            $f_f = $_POST['fecha_fin'];
            
            $insert = "exec ingresarIncapacidad '$f_i','$f_f',1,'$id'";

            $prepare2 = sqlsrv_prepare($conn, $insert);

            if(sqlsrv_execute($prepare2)){
              echo "<script>alert('Incapacidad registrada con exito')</script>";
            }
            else {
              echo "<script>alert('ERROR: No se pudo registrar la incapacidad')</script>";
            }
            
          }
          
        }
      }
    }
  ?>
  </article>
  </div>

  <br><br>
  <footer class="footer">
    <?php include_once './components/footer.php'; ?>
  </footer>
</body>

</html>
