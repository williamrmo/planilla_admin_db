  <nav>
    <?php include_once './components/nav.php'; ?>
  </nav>

  <div class="container">
    <h1>Aprobar planillas</h1>
    <br><br>

    <!-- Informacion de la planilla -->
    <div>
        <table class="table">
            <thead>
                <th scope="col">Fecha</th>
                <th scope="col">Identificaci&oacute;n</th>
                <th scope="col">Puesto</th>
                <th scope="col">Salario Neto</th>
                <th scope="col">Incapacidad</th>
                <th scope="col">CCSS</th>
                <th scope="col">Banco Popular</th>
                <th scope="col">Asosiaci&oacute;n</th>
                <th scope="col">Salario Bruto</th>
                <th scope="col">Estado</th>
            </thead>
            <tbody>
            <?php
                require_once './DB/conexion.php';
                
                $sql = "exec MostrarPlanillaTmp";
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
                                  <td>',$pl['nombre_puesto'],'</td>
                                  <td>',number_format((float)$pl['salario_neto'], 2, '.', ''),'</td>
                                  <td>',number_format((float)$pl['incapacidad'], 2, '.', ''),'</td>
                                  <td>',number_format((float)$pl['ccss'], 2, '.', ''),'</td>
                                  <td>',number_format((float)$pl['banco'], 2, '.', ''),'</td>
                                  <td>',number_format((float)$pl['asosiacion'], 2, '.', ''),'</td>
                                  <td>',number_format((float)$pl['salario_bruto'], 2, '.', ''),'</td>
                                  <td>',$pl['status'],'</td>
                                </tr>';
                        }
                    }
                }

            ?>
                
            </tbody>
        </table>
    </div>
    <br>
    <form action="./controllers/aprobar-controller.php" method="post">
      <input type="submit" value="Aprobar"class="btn btn-success">
    </form>
    
  </div>

  <footer class="footer">
    <?php include_once './components/footer.php'; ?>
  </footer>
</body>

</html>
