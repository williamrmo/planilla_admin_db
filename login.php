  <nav>
    <?php include_once './components/nav.php'; ?>
  </nav>
    <div class="container">
        <h1>Iniciar sesi&oacute;n</h1>
        <form action="./controllers/login-val.php" method="post">
            <label for="user_id">
                Identificaci&oacute;n: <br>
                <input type="number" name="user_id" id="user_id">
            </label>
            <br>
            <label for="user_pass">
                Contrase&ntilde;a <br>
                <input type="password" name="user_pass" id="user_pass">
            </label>
            <br><br>
            <input type="submit" name="" value="Iniciar sesi&oacute;n" class="btn btn-success">
            <button class="btn btn-secondary">
                <a href="./sign-in.php" class="btn-link">Registrarse</a>
            </button>
        </form>
    </div>
    
    <br><br>
  <footer class="footer">
    <?php include_once './components/footer.php'; ?>
  </footer>
</body>

</html>
