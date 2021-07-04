<?php 
	session_start();
	$rut = $_SESSION['current_user'];
	$jefe  = $_SESSION['boss'];
?>


<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  	require("../config/conexion.php");
	$query = "SELECT nombre, edad, rut, direccion FROM usuarios where rut = '$rut';";


	$result = $db2 -> prepare($query);
	$result -> execute();
	$info = $result -> fetchAll();
	
  ?>

<div class='tile is-ancestor'>
	<div class='tile is-parent'>
		<div class='tile is-child box'>
			<?php 
			foreach ($info[0] as $value) {
				echo "<p> $value </p>";
			}

			?>
		</div>
	</div>
</div>


<?php include('../templates/footer.html'); ?>