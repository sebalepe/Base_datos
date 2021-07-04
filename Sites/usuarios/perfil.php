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
	$id = $info2[4];
  ?>
<div clas='m-6'>
	<p class='title is-4'> Bienvenido a Tu Perfil! </p>

	<?php 
	echo "<p class='subtitle is-4'> $info2[0] pasalo bien </p> ";
	?>

	<div class='tile is-ancestor'>
		<div class='tile is-parent'>
			<div class='tile is-child box m-3'>
				<?php 
				for ($i=0; $i<1; $i++) {
			        echo "<p> Nombre: ". $info[$i][0] . "</p>";
			        echo "<p> Edad: ". $info[$i][1] . "</p>";
			        echo "<p> Rut: ". $info[$i][2] . "</p>";
			        echo "<p> Direccion: ". $info[$i][3] . "</p>";
			    }

				?>
			</div>
			<div class='tile is-child is-3 m-3 box'>
			<p class="subtitle is-5"> 
				Tus compras:
			</p>
			<?php 
				$query = "SELECT id_producto, cantidad_producto
						FROM compras where id_comprador = '$id';";
				$result = $db2 -> prepare($query);
				$result -> execute();
				$compras = $result -> fetchAll();
				$len = count($compras);

				foreach ($compras as $compra) {
					echo "<p> $len </p>";
					echo "<p> id: ". $compra[0] . "</p>";
					echo "<p> Cantidad: ". $compra[1] . "</p>";
				}
			?>
			</div>
			<div class='tile is-child is-3 m-3'>
			</div>
		</div>
	</div>
</div>


<?php include('../templates/footer.html'); ?>