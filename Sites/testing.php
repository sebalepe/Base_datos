
<?php include('templates/header.html');   ?>
<?php include('templates/navbar.html');   ?>


<?php $array = [[1,2,3],[4,5,6]];
      $value = 0?>;

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
            Usuarios:
          </p>
          <div class="columns">
            <div class="column">
              <p>
                <?php
                  require("config/conexion.php");
                  $query = "SELECT rut, contraseña FROM usuarios;";
                  $result= $db2 -> prepare($query);
                  $result -> execute();
                  $años = $result -> fetchAll();   
                  
                  
                  foreach ($años as $año) {
                    echo "<p> $año[0], $año[1] </p> ";
                  }
                ?>
              </p>
            </div>
            <div class="column">
              <?php
                  require("config/conexion.php");
                  $query = "SELECT * FROM comestibles;";
                  $result= $db2 -> prepare($query);
                  $result -> execute();
                  $años = $result -> fetchAll();   
                  
                  
                  foreach ($años as $año) {
                    echo "<p> $año[0], $año[1] </p> ";
                  }
                ?>
            </div>

            <div class="column">
              <?php
                  $query = "SELECT comunas FROM Tiendas;";
                  $result= $db2 -> prepare($query);
                  $result -> execute();
                  $años = $result -> fetchAll();   
                  
                  
                  foreach ($años as $año) {
                    echo "<p> $año[0], $año[1] </p> ";
                  }
                ?>
            </div>
          </div>

    </div>
    <div class="hero-body">
      
     

    </div>
  </section>




</body>
</html>