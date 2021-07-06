<?php

session_start();

$_SESSION['current_user'] = '1';
$_SESSION['current_password'] = '1';
$_SESSION['boss'] = '1';
$_SESSION['tienda_actual'] = '1';

?>


<?php include('templates/header.html');   ?>
<?php #include('../data/data_loader.php');   ?>


<body>
  <section class="hero is-danger is-fullheight">
    <br>
    <div align="center">
      <img class="image" src='storage/espada1.png' onmouseover="this.src='storage/espada2.png';" onmouseout="this.src='storage/espada1.png';" width="300" height="300" />
    </div>
    <br>
    <br>
    <div class="hero-head">
        <h1 class="title is-1" align="center">CheemsCO </h1>
          <p class='subtitle is-5' style="text-align:center;">
            Bienvenido
          </p>
    </div>
    <div class="hero-body">
          <div class="tile is-ancestor">
            <div class="tile is-parent" align="center">
                <div class="tile is-child is-box">
                    <div align="center">
                          <a class="button" href="usuarios/registro.php">
                            registro
                          </a>
                          <a class="button" href="usuarios/ingresar.php">
                            ingreso
                          </a>
                    </div>
                </div>
            </div>
          </div>

    </div>
        <br/><br/>
        <br/><br/>
        <br/><br/>
  </section>
</body>
</html>
