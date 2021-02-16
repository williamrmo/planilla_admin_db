<?php session_start(); ?>
  <nav>
    <?php include_once './components/nav.php'; ?>
  </nav>

  <div class="container">
  <article>
    <h1>Mantenimiento de puestos</h1>
    <br>
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Descripci&oacute;n</th>
                    <th>Salario M&iacute;nimo</th>
                    <th>Salario M&aacute;ximo</th>
                    <th>Estudios</th>
                    <th>Departamento</th>
                </thead>
                <tbody>
                <?php
                        require_once './DB/conexion.php';
                        
                        $sql = "exec MostrarPuestos";
                        $prepare = sqlsrv_prepare($conn, $sql);
                        
                        $stm = sqlsrv_query($conn, $sql, array(), array( "Scrollable" => 'static' ));
                        if (sqlsrv_execute($prepare)) {

                            if(sqlsrv_num_rows($stm) != 0) {
                                while($pu = sqlsrv_fetch_array($prepare)) {
                                
                                    echo '
                                        <tr scope="row">
                                            <td>',$pu['id_puesto'],'</td>
                                            <td>',$pu['nombre'],'</td>
                                            <td>',$pu['descripcion'],'</td>
                                            <td>',number_format((float)$pu['salario_min'], 2, '.', ''),'</td>
                                            <td>',number_format((float)$pu['salario_max'], 2, '.', ''),'</td>
                                            <td>',$pu['estudios'],'</td>
                                            <td>',$pu['nombre_depart'],'</td>
                                        </tr>';
                                }
                            }
                        }

                    ?>
                </tbody>
            </table>
        </div>
        <div class="col">
            <form action="./controllers/puesto-contrioller.php" method="post">
                <h3>Editar</h3>
                <label for="id">
                    Codigo: <br>
                    <input type="number" name="id" id="id" value="0" require min="0">
                </label>
                <br>
                <label for="nombre">
                    Nombre: <br>
                    <input type="text" name="nombre" id="nombre">
                </label>
                <br>
                <label for="descripcion">
                    Descripci&oacute;n: <br>
                    <textarea name="descripcion" id="descripcion" cols="23" rows="5" maxlength="300"></textarea>
                </label>
                <br>
                <label for="sal_min">
                    Salario M&iacute;nimo: <br>
                    <input type="number" name="sal_min" id="sal_min" min="0">
                </label>
                <br>
                <label for="sal_max">
                    Salario M&aacute;ximo: <br>
                    <input type="number" name="sal_max" id="sal_max" min="0">
                </label>
                <br>
                <label for="estudios">
                    Estudios: <br>
                    <select name="estudios" id="">
                        <option value="1">S&iacute;</option>
                        <option value="0">No</option>
                    </select>
                </label>
                <br>
                <label for="depa">
                    Departamento: <br>
                    <select class="" name="depa">
                        <?php
                            require_once './DB/conexion.php';
                            
                            $sql = "select * from Departamento";
                            $prepare = sqlsrv_prepare($conn, $sql);
                            
                            $stm = sqlsrv_query($conn, $sql, array(), array( "Scrollable" => 'static' ));
                            if (sqlsrv_execute($prepare)) {

                                if(sqlsrv_num_rows($stm) != 0) {
                                    while($dep = sqlsrv_fetch_array($prepare)) {
                                        var_dump($sql); 
                                        echo '<option value="', $dep['id_departamento'],'">',$dep['Nombre'],'</option>';
                                    }
                                }
                            }

                        ?>
                    </select>
                </label>

                <br><br>
                <input type="submit" value="Agregar / Guardar" class="btn btn-primary">
                <br>
            </form>
            
        </div>
    </div>
    
  </article>
  </div>

  <br><br>
  <footer class="footer">
    <?php include_once './components/footer.php'; ?>
  </footer>
</body>

</html>
