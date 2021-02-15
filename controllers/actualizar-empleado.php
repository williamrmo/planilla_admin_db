<?php
    require_once '../DB/conexion.php';
    include_once '../components/nav.php';
?>

    <!-- Informacion del empleado -->
    <div>
        <h1>Datos empleado</h1>
        <?php
            if (isset($_POST)) {    
                $id = $_POST['user_id'];
                $_SESSION['id_update'] = $id;
                $sql = "SELECT * FROM Usuario WHERE id_usuario = '$id'";
                $prepare = sqlsrv_prepare($conn, $sql);
                if(sqlsrv_execute($prepare)) {
                    while ($u = sqlsrv_fetch_array($prepare)) {
                        $date = date_format($u['fecha_ingreso'], 'Y-m-d');
                        
                        echo '
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
                        ';
                    }
                }
            }
            ?>
    </div>
    <br><br>

    <form action="./update-emp-controller.php" class="" method="post">
      <label for="user_salario">
          Salario: <br>
          <input type="number" name="user_salario" id="user_salario">
      </label>
      <br><br>
      <label for="user_aso">
          Asosiaci&oacute;n: <br>
          <select class="" name="user_aso">
            <option value="Activo_aso">Activo</option>
            <option value="Inactivo_aso">Inactivo</option>
          </select>
      </label>
      <br><br>
      <label for="user_cuenta">
          Cuenta bancaria: <br>
        <input type="number" name="user_cuenta" id="user_cuenta">
      </label>
      <br><br>
      <label for="user_puesto">
          Puesto: <br>
          <select class="" name="user_puesto">
            <?php
                require_once '../DB/conexion.php';
                
                $sql = "exec MostrarPuestos";
                $prepare = sqlsrv_prepare($conn, $sql);
                
                $stm = sqlsrv_query($conn, $sql, array(), array( "Scrollable" => 'static' ));
                if (sqlsrv_execute($prepare)) {

                    if(sqlsrv_num_rows($stm) != 0) {
                        while($u = sqlsrv_fetch_array($prepare)) {
                            echo '<option value="', $u['id_puesto'],'">',$u['nombre'],'</option>';
                        }
                    }
                }

            ?>
          </select>
      </label>
      <br><br>
      <label for="user_estado">
          Estado: <br>
          <select class="" name="user_estado">
            <option value="1">Activo</option>
            <option value="0">Inactivo</option>
          </select>
      </label>
      <br><br>
      <label for="user_permiso">
          Permiso: <br>
          <select class="" name="user_permiso">
            <?php
                require_once '../DB/conexion.php';
                
                $sql = "select * from Permiso;";
                $prepare = sqlsrv_prepare($conn, $sql);
                
                $stm = sqlsrv_query($conn, $sql, array(), array( "Scrollable" => 'static' ));
                if (sqlsrv_execute($prepare)) {

                    if(sqlsrv_num_rows($stm) != 0) {
                        while($p = sqlsrv_fetch_array($prepare)) {
                            echo '<option value="', $p['id_permiso'],'">',$p['tipo'],'</option>';
                        }
                    }
                }

            ?>
          </select>
      </label>
      <br><br>
      <input type="submit" value="Guardar / Modificar">
    </form>
    </article>

    <br><br>
</body>
</html>