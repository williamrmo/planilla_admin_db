<?php session_start(); ?>
  <nav>
    <?php include_once './components/nav.php'; ?>
  </nav>

  <article class="container">
    <h1>Gestionar informaci&oacute;n de empleado</h1>
    <br>

    <form method="get">
        <label for="id_user">
            Identificaci&oacute;n: <br>
            <input type="text" name="id_user" id="id_user">
        </label>
        <br><br>
        <input type="submit" value="Buscar" class="btn btn-primary">
    </form>

    <?php
      if(isset($_GET['id_user'])){
        $id = $_GET['id_user'];
        include_once 'DB/conexion.php';

        $sql = "SELECT * FROM Usuario WHERE id_usuario = '$id'";
                $prepare = sqlsrv_prepare($conn, $sql);
                if(sqlsrv_execute($prepare)) {
                    while ($u = sqlsrv_fetch_array($prepare)) {
                        $date = date_format($u['fecha_ingreso'], 'Y-m-d');
                        
                        echo '
                          <div class="row">
                            <div class="col">
                              <h1>Datos empleado</h1>
                              <table>
                                  <tr>
                                      <td>Identificai&oacute;n: </td>
                                      <td>',$u['id_usuario'],'</td>
                                  </tr
                                  <tr>
                                      <td>Nombre: </td>
                                      <td>',$u['nombre'],'</td>
                                  </tr>
                                  <tr>
                                      <td>Primer Apellido: </td>
                                      <td>',$u['primer_apellido'],'</td>
                                  </tr>
                                  <tr>
                                      <td>Segundo Apellido: </td>
                                      <td>',$u['segundo_apellido'],'</td>
                                  </tr>
                                  <tr>
                                      <td>Nacionalidad: </td>
                                      <td>',$u['nacionalidad'],'</td>
                                  </tr>
                                  <tr>
                                      <td>Dircci&oacute;n: </td>
                                      <td>',$u['direccion'],'</td>
                                  </tr>
                                  <tr>
                                      <td>Asosiaci&oacute;n: </td>
                                      <td>', $u['asosiacion'],'</td>
                                  </tr>
                                  <tr>
                                      <td>Fecha de Ingreso: </td>
                                      <td>', $date ,'</td>
                                  </tr>
                                  <tr>
                                      <td>Tel&eacute;fono: </td>
                                      <td>', $u['telefono'],'</td>
                                  </tr>
                              </table>
                              </div>

                              <div class="col">
                                <form action="./controllers/update-emp-controller.php" class="" method="post">
                                <label for="user_salario">
                                    Salario: <br>
                                    <input type="number" name="user_salario" id="user_salario" required>
                                </label>
                                <br>
                                <label for="user_aso">
                                    Asosiaci&oacute;n: <br>
                                    <select class="" name="user_aso">
                                      <option value="Activo_aso">Activo</option>
                                      <option value="Inactivo_aso">Inactivo</option>
                                    </select>
                                </label>
                                <br>
                                <label for="user_cuenta">
                                    Cuenta bancaria: <br>
                                  <input type="number" name="user_cuenta" id="user_cuenta" required>
                                </label>
                                <br>
                                <label for="user_puesto">
                                    Puesto: <br>
                                    <select class="" name="user_puesto">';?>
                                        <?php
                                          $sql = "exec MostrarPuestos";
                                          $prepare = sqlsrv_prepare($conn, $sql);
                                          
                                          $stm = sqlsrv_query($conn, $sql, array(), array( "Scrollable" => "static" ));
                                          if (sqlsrv_execute($prepare)) {
                          
                                              if(sqlsrv_num_rows($stm) != 0) {
                                                  while($u = sqlsrv_fetch_array($prepare)) {
                                                      echo '<option value="', $u['id_puesto'],'">',$u['nombre'],'</option>';
                                                  }
                                              }
                                          }
                          
                                    echo '
                                    </select>
                                </label>
                                <br>
                                <label for="user_estado">
                                    Estado: <br>
                                    <select class="" name="user_estado">
                                      <option value="1">Activo</option>
                                      <option value="0">Inactivo</option>
                                    </select>
                                </label>
                                <br>
                                <label for="user_permiso">
                                    Permiso: <br>
                                    <select class="" name="user_permiso">'.
                                          
                                          $sql2 = "select * from Permiso";
                                          $prepare2 = sqlsrv_prepare($conn, $sql2);
                                          
                                          $stm = sqlsrv_query($conn, $sql2, array(), array( "Scrollable" => 'static' ));
                                          if (sqlsrv_execute($prepare2)) {
                          
                                              if(sqlsrv_num_rows($stm) != 0) {
                                                  while($p2 = sqlsrv_fetch_array($prepare2)) {
                                                      echo '<option value="', $p2['id_permiso'],'">',$p2['tipo'],'</option>';
                                                  }
                                              }
                                          }
                                          echo
                                    "</select>
                                </label>
                                <br><br>
                                <input type='submit' value='Guardar / Modificar' class='btn btn-success'>
                              </form>
                              </div>
                            </div>
                        ";
                    }
                }
      }
    ?>
  </article>
  
  <br><br>
  <footer class="footer">
    <?php include_once './components/footer.php'; ?>
  </footer>
</body>

</html>
