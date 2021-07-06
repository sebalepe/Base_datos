<?php 
  session_start();
?>
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

            <div class="column">
              <?php
                  $rut = $_SESSION['current_user'];

                  $query = "SELECT * from usuarios
                            where rut = '$rut';"; 

                  $result = $db2 -> prepare($query);
                  $result -> execute();
                  $personal = $result -> fetchAll();
                  echo "
                  <table class = 'table'>

                      <tr>
                        <th>0</th>
                        <th>1</th>
                        <th>2</th>
                        <th>3</th>
                        <th>4</th>
                        <th>5</th>
                        <th>6</th>
                        <th>7</th>
                        <th>8</th>
                        <th>9</th>
                      </tr>
                      ";
                        
                      foreach ($personal as $persona) {
                        echo "<tr>
                                  <td>$persona[0]</td>
                                  <td>$persona[1]</td>
                                  <td>$persona[2]</td>
                                  <td>$persona[3]</td>
                                  <td>$persona[4]</td>
                                  <td>$persona[6]</td>
                                  <td>$persona[7]</td>
                                  <td>$persona[8]</td>
                                  <td>$persona[9]</td>
                              </tr>";
                    }


                  echo "</table>";
                

                $query = "SELECT * from direcciones
                            where id = 937 ;"; 
                $result = $db2 -> prepare($query);
                $result -> execute();
                $d = $result -> fetchAll();
                $direccion = $d[0][0];
                echo $direccion;
                ?>
            </div>
          </div>

    </div>
    <div class="hero-body">
      
     

    </div>
  </section>




</body>
</html>