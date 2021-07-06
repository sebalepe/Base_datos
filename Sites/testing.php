
<?php include('templates/header.html');   ?>
<?php include('templates/navbar.html');   ?>
<?php #include('../data/data_loader2.php');   ?>

<p> Funciona </p>
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
                  $rut = $_SESSION['current_user'];

                  $query = "SELECT * from usuarios, direcciones
                            where rut = '$rut' and direcciones.id = usuarios.direccion;"; 

                  $result = $db2 -> prepare($query);
                  $result -> execute();
                  $comunas = $result -> fetchAll(); 
                  $comuna = $comunas[0]; 
                  $n_comuna = $comuna[0]; 
                  echo count($comunas); 

                  foreach ($comunas as $comuna) {
                     echo "<p> $comuna[0], $comuna[1] <p>";
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