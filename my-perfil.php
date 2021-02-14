
    <nav>
      <?php include_once './components/nav.php'; ?>
    </nav>

    <article class="container">
        <!-- Informacion del empleado -->
        <div>
            <h1>My perfil</h1>
            <?php
                require_once 'DB/conexion.php';
                $id_us = $_SESSION['user'];
                $sql = "SELECT * FROM Usuario WHERE id_usuario = '$id_us'";
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
                
            ?>
    
        </div>
        <br><br>

        <!-- Informacion de la planilla -->
        <div>
            <?php
                $sql = "SELECT * FROM Usuario WHERE id_usuario = '23232312464' AND password = 'admin'";
                $prepare = sqlsrv_prepare($conn, $sql);
                if(sqlsrv_execute($prepare)) {
                    while ($u = sqlsrv_fetch_array($prepare)) {
                        $date = date_format($u['fecha_ingreso'], 'Y-m-d');
                        
                        echo '
                            <table style="border: 1px red sold;">
                                <thead>
                                    <th>Fecha</th>
                                    <th>Salario Neto</th>
                                    <th>Incapacidad</th>
                                    <th>CCSS</th>
                                    <th>Banco Popular</th>
                                    <th>Asosiaci&oacute;n</th>
                                    <th>Salario Bruto</th>
                                    <th>Estado</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>',$u['id_usuario'],'</td>
                                        <td>N/A</td>
                                        <td>N/A</td>
                                        <td>N/A</td>
                                        <td>N/A</td>
                                        <td>N/A</td>
                                        <td>N/A</td>
                                        <td>N/A</td>
                                    </tr>
                                </tbody>
                            </table>';
                    }
                }
                
            ?>
        </div>
    </article>
</body>

</html>
