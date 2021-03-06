<?php session_start(); ?>
    <nav>
        <?php include_once './components/nav.php'; ?>
    </nav>

    <div class='container'>

        <article class="articulo">
            <h2>Contactenos</h2>
                <table id="tabla" class="table">

                    <thead>
                        <tr>
                            <td>Nombre</td>
                            <td>Telefono</td>
                        </tr>
                    </thead>
                
                    <tbody>

                        <?php
                            require_once 'DB/conexion.php';

                            $sql = "SELECT * FROM Contacto";
                            
                            $prepare = sqlsrv_prepare($conn, $sql);
                            if(sqlsrv_execute($prepare)) {
                                while ($c = sqlsrv_fetch_array($prepare)) {
                                    echo '
                                            <tr>
                                                <td>',$c['nombre'],'</td>
                                                <td>',$c['telefono'],'</td>
                                            </tr
                                    ';
                                }
                            }
                            
                        ?>

                    </tbody>
                </table>
                <div>
                    <br>

                    <h2 id="ph2">Como se llega?</h2>
                    <p id="parrafo"> Del BARRIO EL MOLINO  de la Funeraria La Última Joya, 300 metros Sur,</p>
                    <p id="parrafo">o bien del Colegio San Luis Gonzaga 200 metros oeste y 250 metros al sur</p>


                </div>
               
            </article>

        <br>
        
        
    </div>
    <footer class="footer">
            <?php include_once './components/footer.php'; ?>
        </footer>
</body>
</html>