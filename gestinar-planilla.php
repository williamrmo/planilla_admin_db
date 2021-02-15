  <nav>
    <?php include_once './components/nav.php'; ?>
  </nav>

  <div class="container">
    <h1>Gestionar datos planilla</h1>
    <br><br>
    <form action="" method="get">
    <label for="user_id">
        Identificaci&oacute;n: <br> 
        <input type="text" name="user_id" id="user_id" required>
        <br><br>

        <input type="submit" value="Buscar" class="bn btn-primary">
    </label>
    </form>
    
    <br>

    <?php
      
      if(isset($_GET['user_id'])){
        include_once './DB/conexion.php';
        $id = $_GET['user_id'];
        $sql = "exec MostrarUsuarioTmp '$id'";

      $prepare = sqlsrv_prepare($conn, $sql);
                
      $stm = sqlsrv_query($conn, $sql, array(), array( "Scrollable" => 'static' ));
      if (sqlsrv_execute($prepare)) {

        if(sqlsrv_num_rows($stm) != 0) {
          $sql2 = "exec MostrarPlanillaTmpID '$id'";
          $prepare2 = sqlsrv_prepare($conn, $sql2);

          if (sqlsrv_execute($prepare2)) {
          $pl = sqlsrv_fetch_array($prepare2);

           
          $date = date_format($pl['fecha'], 'Y-m-d');
          echo '
            <form class="" action="./controllers/planilla-id-controller.php" method="post">
                <label for="id">
                  <input type="hidden" name="id" value="',$id,'" required>
                </label>
                <br>
                <label for="incapacidad">
                  Incapacidad: <br>
                  <input type="number" name="incapacidad" value="',number_format((float)$pl['incapacidad'], 2, '.', ''),'" required>
                </label>
                <br>
                <label for="ccss">
                  CCSS: <br>
                  <input type="number" name="ccss" value="',number_format((float)$pl['ccss'], 2, '.', ''),'" required>
                </label>
                <br>
                <label for="banco">
                  Banco Polpular: <br>
                  <input type="number" name="banco" value="',number_format((float)$pl['banco'], 2, '.', ''),'" required>
                </label>
                <br>
                <label for="asosiacion">
                  Asosiacion: <br>
                  <input type="number" name="asosiacion" value="',number_format((float)$pl['asosiacion'], 2, '.', ''),'" required>
                </label>
                <br><br>
                <input type="submit" value="Guardar / Modificar" class="bn btn-success">
              </form>
              ';
          }
        }
      }

      }
      
    ?>

  </div>
  
  <br><br>
  <footer class="footer">
    <?php include_once './components/footer.php'; ?>
  </footer>
</body>

</html>
