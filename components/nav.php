
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Planilla</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous"> -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/style.css">
    
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="./index.php">Inicio</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <?php if(isset($_SESSION['user'])): ?>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="./my-perfil.php">Mi perfil</a>
            </li>
            <!-- Admins -->
            <?php if($_SESSION['user']['id_departamento'] == 1): ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Recursos Humanos
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  
                  <!-- Permisos de escritura -->
                  <?php if($_SESSION['user']['id_permiso'] == 2): ?>
                    <li><a class="dropdown-item" href="./gestinar-planilla.php">Gestionar datos planilla</a></li>
                    <li><a class="dropdown-item" href="./puestos.php">Mantenimiento puesto</a></li>
                    <li><a class="dropdown-item" href="./aprobar-planilla.php">Aprobar planilla</a></li>
                    <li><a class="dropdown-item" href="./incapacidades.php">Gestionar incapacidades</a></li>
                  <li><a class="dropdown-item" href="./gestionar-empleado.php">Gestionar informaci&oacute;n de empleado</a></li>
                  <?php endif; ?>
    
                  <li><a class="dropdown-item" href="./registros-planilla.php">Ver registros de planilla</a></li>

                </ul>
              </li>
            <?php endif; ?>
          <?php endif; ?>
          

          <li class="nav-item">
            <a class="nav-link" href="./contacto.php">Contacto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./acerca-de.php">Acerca de</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Iniciar sesi&oacute;n
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="./login.php">Iniciar sesi&oacute;n</a></li>
              <li><a class="dropdown-item" href="./sign-in.php">Registrarse</a></li>
              <li><a class="dropdown-item" href="./controllers/logout.php">Salir</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <br>
