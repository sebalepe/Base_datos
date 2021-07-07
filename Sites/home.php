<?php
	session_start();
  $_SESSION['compra'] = array();
?>

<?php include('templates/header.html');   ?>
<?php include('templates/navbar.html');   ?>

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
            Donde te gustaria comprar?
          </p>
    </div>
    <div class="hero-body">
          <div class="tile is-ancestor">
	          <div class="tile is-parent is-vertical">

	          	<?php 
	          		require("config/conexion.php");
	          		$query = "SELECT nombre, comuna_tienda, id from tiendas;"; 

	          		$result = $db2 -> prepare($query);
      					$result -> execute();
      					$Tiendas = $result -> fetchAll();


      					foreach ($Tiendas as $tienda) {
      						echo "
                  <div class='tile is-child box'>
      							<div class='columns is-gapless'>	
                      <div class='column is-one-quarter'>
                        <img class='image' src='storage/tienda.png' width='50' height='50' />
                      </div>
                      <div class='column'>
                        <p> Nombre: $tienda[0] </p>
        								<p> Comuna: $tienda[1] </p>
        								<form align='center' action='Tiendas/show.php' method='post'>
        								    <button class='button is-danger'   name='id' type='submit' value='$tienda[2]'> Ver Tienda </button>
        								</form>
                      </div>
                    </div>
      						</div>";
      					}
      	          	?>
	          </div>	
          </div>
        <br/><br/>
        <br/><br/>
        <br/><br/>
    </div>

<?php include('templates/footer.html'); ?>


