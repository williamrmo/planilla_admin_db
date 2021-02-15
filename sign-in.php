  <nav>
    <?php include_once './components/nav.php'; ?>
  </nav>

    <form class="container" action="./controllers/sign-in-val.php" method="post">
        <h1>Registrarse</h1>
        <label for="user_id">
            Identificaci&oacute;n: <br>
            <input type="text" name="user_id" id="user_id">
        </label>
        <br>
        <label for="user_name">
            Nombre: <br>
            <input type="text" name="user_name" id="user_name">
        </label>
        <br>
        <label for="user_1_last_name">
            Primer Apellido: <br>
            <input type="text" name="user_1_last_name" id="user_1_last_name">
        </label>
        <br>
        <label for="user_2_last_name">
            Segundo Apellido: <br>
            <input type="text" name="user_2_last_name" id="user_2_last_name">
        </label>
        <br>
        <label for="user_password">
            Contrase&ntilde;a: <br>
            <input type="text" name="user_password" id="user_password">
        </label>
        <br>
        <label for="user_country">
            Nacionalidad: <br>
            <input type="text" name="user_country" id="user_country">
        </label>
        <br>
        <label for="user_direction">
            Direcci&oacute;n: <br>
            <textarea name="user_direction" id="user_direction" cols="23" rows="4"></textarea>
        </label>
        <br>
        <label for="user_phone">
            Tel&eacute;fono: <br>
            <input type="text" name="user_phone" id="user_phone">
        </label>
        <br><br>    
        <input type="submit" name="" value="Registrarse" class="btn btn-success">
        <button  class="btn btn-secondary">
            <a href="./login.php" class="btn-link">Iniciar sesi&oacute;n</a>
        </button>

    </form>

    <br><br>
  <footer class="footer">
    <?php include_once './components/footer.php'; ?>
  </footer>
</body>

</html>
