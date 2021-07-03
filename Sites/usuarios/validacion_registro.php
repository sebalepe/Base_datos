<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $nombre = $_POST["nombre"];
 	$query = "SELECT nombre FROM usuarios;";


	$result = $db2 -> prepare($query);
	$result -> execute();
	$nombres = $result -> fetchAll();
  ?>

  <?php if (in_array($nombre, $nombres[0])): ?>
  <p> no se pudo </p>

  <?php else: ?>
  <p> si se pudo </p>
  <?php endif ?>

<?php include('../templates/footer.html'); ?>
