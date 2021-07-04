<?php
session_start();

$_SESSION['current_user'] = '1';
$_SESSION['current_password'] = '1';
?>


<?php include('templates/header.html');   ?>
<?php #REPARAR BASES DE DATOS
include('../data/data_loader.php');

?>

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
            Todo lo que necesitas para administrar tu negocio
          </p>
    </div>
    <div class="hero-body">
          <div class="tile is-ancestor">
            <div class="tile is-parent">
              <div class='tile is-child'>
              <h3 class="title is-4 has-text-black" align="center">
                <?php
                        require("config/conexion.php");
                        $query = "SELECT rut, nombre FROM usuarios;";
                        $result= $db2 -> prepare($query);
                        $result -> execute();
                        $años = $result -> fetchAll();   
                        foreach ($años as $año) {
                          echo "<p>
                                    $año[0], $año[1]
                                </p>";
                          }
                       ?>
                </h3>
              </div>
            </div>
            <div class="tile is-parent is-2">
                <div class="tile is-child is-box">
                    <div align="center">
                          <a class="button" href="usuarios/registracion.php">
                            registracion
                          </a>
                          <a class="button" href="usuarios/ingresar.php">
                            ingreso
                          </a>
                    </div>
                </div>
            </div>
            <div class="tle is-parent">
              <div class='tile is-child'>
              </div>
            </div>

          </div>
        <br/><br/>
        <br/><br/>
        <br/><br/>
    </div>
  </section>
</body>
</html>
