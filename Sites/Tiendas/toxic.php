<?php include('../templates/header.html');   ?>
<?php include('../templates/navbar.html');   ?>


<?php 
	require("../config/conexion.php");

 	$id = $_POST['id'];
 	$algo = "SELECT nombre, precio, descripcion, ancho, alto, largo, peso
 	  from no_comestibles where id = $id;";
	$result = $db2 -> prepare($algo);
	$result -> execute();
	$productos = $result -> fetchAll();
	$producto = $productos[0];
?>

<body>
  <section class="hero is-danger is-fullheight">
    
    <div class="m-5">
	  	<div class="tile is-ancestor">
	  		<div class="tile is-parent is-6">
	  			<div class="tile is-child is-8">
	  			</div>
	  			<div class="tile is-child box is-8">
	  				<?php 

	  				echo "
	  					<p> Nombre: $producto[0] </p>
	  					<p> Precio: $producto[1]</p>
	  					<p> Descripcion: $producto[2]</p>
	  					<p> Ancho: $producto[3] </p>
	  					<p> Alto: $producto[4]</p>
	  					<p> Largo: $producto[5]</p>
	  					<p> Peso: $producto[6]</p>
	  				";
	  				?>
	  			</div>
	  		</div>
	  	</div>
	</div>



<?php include('../templates/footer.html'); ?>