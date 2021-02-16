<?php session_start(); ?>
    <nav>
      <?php include_once './components/nav.php'; ?>
    </nav>
  </div>
    <article>
    <br>
    <div class="container">
      <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img height="300px" src="./src/intro-img2.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Revia la informacion de tus pagos</h5>
            </div>
          </div>
          <div class="carousel-item">
            <img height="300px" src="./src/intro-img1.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Agiliza el procceso de calcula la planilla</h5>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"  data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"  data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
    
    </article>
    
    <footer class="footer">
      <?php include_once './components/footer.php'; ?>
    </footer>
  </body>
</html>
