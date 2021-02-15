  <nav>
    <?php include_once './components/nav.php'; ?>
  </nav>

  <div class="container">
    <h1>Gestionar datos planilla</h1>
    <br><br>

    <label for="user_id">
        Identificaci&oacute;n: <input type="text" name="user_id" id="user_id">
    </label>
    <button>Buscar</button>
    <br><br>

    <!-- Informacion de la planilla -->
    <div>
        <table>
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
                    <td>N/A</td>
                    <td>N/A</td>
                    <td>N/A</td>
                    <td>N/A</td>
                    <td>N/A</td>
                    <td>N/A</td>
                    <td>N/A</td>
                    <td>N/A</td>
                </tr>
            </tbody>
        </table>
    </div>
<br><br>
    <form class=""  method="post">
      <label for="fecha">
        Fecha: <input type="text" name="fecha">
      </label>
      <br><br>
      <label for="user_inc">
        Dias incapacidad: <input type="number" name="user_inc">
      </label>
      <br><br>
      <label for="user_aso">
          Asosiaci&oacute;n:
          <select class="" name="user_aso">
            <option value="Activo_aso">Activo</option>
            <option value="Inactivo_aso">Inactivo</option>
          </select>
      </label>
      <br><br>
      <label for="user_estado">
          Estado:
          <select class="" name="user_estado">
            <option value="Activo_emp">Activo</option>
            <option value="Inactivo_emp">Inactivo</option>
          </select>
      </label>
      <br><br>
      <button name="button">Guardar / Modificar</button>
    </form>
  </div>
  
  <br><br>
  <footer class="footer">
    <?php include_once './components/footer.php'; ?>
  </footer>
</body>

</html>
