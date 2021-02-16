<?php session_start(); ?>
    <nav>
      <?php include_once './components/nav.php'; ?>
    </nav>




    <article class="container">

    
    <!-- Modales-->
        <!-- Modal de editar direccion -->
        <div class="modal fade" id="modal-direc" tabindex="-1" role="dialog" aria-labelledby="modal-direc" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-direc">Editar Direccion</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="./controllers/nueva-direc-controller.php" method="post">
                            <label for="direc">
                                <?php
                                    $id =$_SESSION['user']['id_usuario'];
                                    echo '<input type="hidden" name="id" id="id" value="',$id,'">';
                                ?>
                                Nueva Direccion: <br>
                                <textarea name="direc" id="direc" cols="30" rows="5"></textarea>
                            </label>
                            <br><br>
                            <input type='submit' value='Guardar / Modificar' class='btn btn-success'>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal de editar telefono -->
        <div class="modal fade" id="modal-tel" tabindex="-1" role="dialog" aria-labelledby="modal-tel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-tel">Editar Telefono</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="./controllers/nuevo-telefono-controller.php" method="post">
                        <label for="telefono">
                            <?php
                                $id =$_SESSION['user']['id_usuario'];
                                echo '<input type="hidden" name="id" id="id" value="',$id,'">';
                            ?>
                                Nueva Telefono: <br>
                            <input type="number" name="telefono" id="telefono">
                        </label>
                        <br><br>
                        <input type='submit' value='Guardar / Modificar' class='btn btn-success'>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </div>
        </div>

        <!-- Informacion del empleado -->
        <div>
            <h1>My perfil</h1>
            <?php
                require_once 'DB/conexion.php';
                
                $id_us = $_SESSION['user']['id_usuario'];
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
                                    <td>',$u['direccion'],'
                                        
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-direc">
                                            Editar
                                        </button> 
                                    </td>
                                </tr>
                                <tr>
                                    <td>Asosiaci&oacute;n: </td>
                                    <td>', $u['asosiacion'],'</td>
                                </tr>
                                <tr>
                                    <td>Fecha de Ingreso: </td>
                                    <td>',$date ,'</td>
                                </tr>
                                <tr>
                                    <td>Tel&eacute;fono: </td>
                                    <td>', 
                                        $u['telefono'],'
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-tel">
                                            Editar
                                        </button>
                                    </td>
                                </tr>
                            </table>
                        ';
                    }
                }
                
            ?>
    
        </div>
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
                
               $sql = "exec MostrarPlanillaHistID '$id_us'";
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
    </article>


    <br><br>
    <footer class="footer">
      <?php include_once './components/footer.php'; ?>
    </footer>

    

</html>
