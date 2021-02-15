
  <nav>
    <?php include_once './components/nav.php'; ?>
  </nav>

  <article class="container">
    <h1>Gestionar informaci&oacute;n de empleado</h1>

    <br>
    <form action="./controllers/actualizar-empleado.php" method="post">
        <label for="user_id">
            Identificaci&oacute;n: <br>
            <input type="text" name="user_id" id="user_id">
        </label>
        <br>
        <input type="submit" value="Buscar">
    </form>
  </article>
  
  <br><br>
  <footer class="footer">
    <?php include_once './components/footer.php'; ?>
  </footer>
</body>

</html>
