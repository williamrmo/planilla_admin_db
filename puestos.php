  <nav>
    <?php include_once './components/nav.php'; ?>
  </nav>

  <div class="container">
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
            <h3>Editar</h3>
            <label for="id">
                Codigo: <br>
                <input type="text" name="id" id="id">
            </label>
            <br>
            <label for="nombre">
                Nombre: <br>
                <input type="text" name="nombre" id="nombre">
            </label>
            <br>
            <label for="sal_max">
                Salario M&iacute;nimo: <br>
                <input type="text" name="sal_max" id="sal_max">
            </label>
            <br>
            <label for="sal_min">
                Salario M&aacute;ximo: <br>
                <input type="text" name="sal_min" id="sal_min">
            </label>
            <br>
            <label for="estudios">
                Estudios: <br>
                <select name="" id="">
                    <option value="1">S&iacute;</option>
                    <option value="0">No</option>
                </select>
            </label>
            <br><br>
            <input type="submit" value="Agregar / Guardar" class="btn btn-primary">
            <br>
        </div>
    </div>
    
    <br>
    
  </div>
</body>

</html>
