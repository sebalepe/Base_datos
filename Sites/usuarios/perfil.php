<?php 
	session_start();
?>


<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

	
	$query = "SELECT * FROM usuarios where rut = '$_SESSION['current_user']';";


	$result = $db2 -> prepare($query);
	$result -> execute();
	$usuario = $result -> fetchAll();
	
  ?>



  <table class = 'table'>
    <tr>
      <th>ID</th>
      <th>direcciones</th>
      <th>Nombre</th>
      <th>edad</th>
      <th>sexo</th>
      <th>direccion</th>
      <th>rut</th>

    </tr>
      <?php
        foreach ($usuario as $value) {
          echo "<tr>
                    <td>$value[0]</td>
                    <td>$value[1]</td>
                    <td>$value[2]</td>
                    <td>$value[3]</td>
                    <td>$value[4]</td>
                    <td>$value[5]</td>
                    <td>$value[6]</td>
                </tr>";
      }
      ?>
  </table>


<?php include('../templates/footer.html'); ?>