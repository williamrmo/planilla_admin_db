    <nav>
        <?php include_once './components/nav.php'; ?>
    </nav>

    <div class='container'>
        <aside id="ContenidoPagina">
            <h2>Contactenos</h2>
    
            <article class="articulo">
                <table id="tabla">

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
                                    var_dump($c);
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
               
            </article>

            <article class="articulo">
                <h2 id="ph2">Como se llega?</h2>
                <p id="parrafo"> Del BARRIO EL MOLINO  de la Funeraria La Última Joya, 300 metros Sur,</p>
                <p id="parrafo">o bien del Colegio San Luis Gonzaga 200 metros oeste y 250 metros al sur</p>
            </article>

        </aside>
        
        
    </div>
    <footer class="footer">
            <?php include_once './components/footer.php'; ?>
        </footer>
</body>
</html>