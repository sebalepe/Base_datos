<?php include('../templates/header.html');   ?>

<body>
<?php
  
  require("../config/conexion.php");

  
  $id = $_POST["id"];

  $query = "SELECT * from tiendas where id = '$id' ;";

 
  $result = $db2 -> prepare($query);
  $result -> execute();
  $Tiendas = $result -> fetchAll(); 
  $Tienda = $Tiendas[0]; 


  echo "
    <div align='center'>
        <p class='title is-3'>
            Bienvenido a $Tienda[2] 
        </p>

        <p class='subtitle is-5'>
          20% de descuento con CMR en todos los productos
        </p>
    </div"


?>

<div class="modal">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Test</p>
      <button class="delete" aria-label="close"></button>
    </header>
    <section class="modal-card-body">
     WENA
    </section>
    <footer class="modal-card-foot">
      <button class="button">Volver</button>
    </footer>
  </div>
</div>












  <!--
 	$query = "SELECT * from tiendas where id = '$id' ;";

 
	$result = $db2 -> prepare($query);
	$result -> execute();
	$Tiendas = $result -> fetchAll(); 
  $Tienda = $Tiendas[0]; 
  

  foreach ($Tienda as $value) {
     echo "<p> $value </p>";
  }

?>
-->


<?php include('../templates/footer.html'); ?>