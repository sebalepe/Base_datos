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

<div id="modal" class="modal">
  <div class="modal-background"></div>
  <div class="modal-content">
    <div class="box">
      <article class="media">               
        <div class="media-content">       
          <div class="content">               
            <p>                 
                               
            </p>                 
          </div>                 
        </div> 
        <button class="button is-danger is-small" id="closebtn">Close Modal</button>                
      </article>                
    </div>                
  </div>                
  <button class="modal-close is-large" aria-label="close"></button>                
</div>               
<button class="button is-danger is-large" id="lanuchModal">Show Modal</button>               
<script>                 
$("#lanuchModal").click(function() {

$(".modal").addClass("is-active");                 
});

$(".modal-close").click(function() {

 $(".modal").removeClass("is-active");               
});

$("#closebtn").click(function() {
 $(".modal").removeClass("is-active");              
});

</script>












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