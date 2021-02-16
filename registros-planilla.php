<?php session_start(); ?>
  <nav>
    <?php include_once './components/nav.php'; ?>
  </nav>

  <div class="container">
    <h1>Ver registros de las planillas</h1>
    <br>

    <!-- Informacion de la planilla -->
    <div>
        <table class="table">
            <thead>
                <th>Fecha</th>
                <th>Identificaci&oacute;n</th>
                <th>Puesto</th>
                <th>Salario Neto</th>
                <th>Incapacidad</th>
                <th>CCSS</th>
                <th>Banco Popular</th>
                <th>Asosiaci&oacute;n</th>
                <th>Salario Bruto</th>
                <th>Estado Empleado</th>
            </thead>
            <tbody>
              <?php
                require_once './DB/conexion.php';
                
                $sql = "exec MostrarPlanillaHist";
                $prepare = sqlsrv_prepare($conn, $sql);
                
                $stm = sqlsrv_query($conn, $sql, array(), array( "Scrollable" => 'static' ));
                if (sqlsrv_execute($prepare)) {

                    if(sqlsrv_num_rows($stm) != 0) {
                        while($pl = sqlsrv_fetch_array($prepare)) {
                          $date = date_format($pl['fecha'], 'Y-m-d');
                            echo '
                                <tr scope="row">
                                  <td>',$date,'</td>
                                  <td>',$pl['id_usuario'],'</td>
                                  <td>',$pl['puesto'],'</td>
                                  <td>',number_format((float)$pl['salario_neto'], 2, '.', ''),'</td>
                                  <td>',number_format((float)$pl['incapacidad'], 2, '.', ''),'</td>
                                  <td>',number_format((float)$pl['ccss'], 2, '.', ''),'</td>
                                  <td>',number_format((float)$pl['banco'], 2, '.', ''),'</td>
                                  <td>',number_format((float)$pl['asosiacion'], 2, '.', ''),'</td>
                                  <td>',number_format((float)$pl['salario_bruto'], 2, '.', ''),'</td>
                                  <td>',$pl['estado_empl'],'</td>
                                </tr>';
                        }
                    }
                }

              ?> 
            </tbody>
        </table>
    </div>
    <br><br>
  </div>

  <footer class="footer">
    <?php include_once './components/footer.php'; ?>
  </footer>
</body>

</html>
