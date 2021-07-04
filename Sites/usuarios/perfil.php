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
	$query = "SELECT nombre, edad, rut, direccion, id FROM usuarios where rut = '$rut';";


	$result = $db2 -> prepare($query);
	$result -> execute();
	$info = $result -> fetchAll(); 
	$info2 = $info[0];
  ?>

<p class='title is-4'> Bienvenido a Tu Perfil! </p>

<?php 
echo "<p class='subtitle is-4'> $info2[0] pasalo bien </p> ";
?>

<div class='tile is-ancestor'>
	<div class='tile is-parent'>
		<div class='tile is-child is-3'>
		</div>
		<div class='tile is-child box'>
			<?php 
			for ($i=0; $i<1; $i++) {
		        echo "<p>". $info[$i][0] . "</p>";
		        echo "<p>". $info[$i][1] . "</p>";
		        echo "<p>". $info[$i][2] . "</p>";
		        echo "<p>". $info[$i][3] . "</p>";
		    }

			?>
		</div>
		<div class='tile is-child is-3'>
		</div>
	</div>
</div>


<?php include('../templates/footer.html'); ?>