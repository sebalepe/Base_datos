<?php include('../templates/header.html');   ?>
<?php include('../templates/navbar.html');   ?>

<body>

<div class="grid-block" style="background-image: url('../storage/fondo.png'); width: 100; height: 100; ">

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


  <div class="tile is-parent is-vertical">
    <div align="center" class="tile is-child box">
      <div id="modal" class="modal">
        <div class="modal-background"></div>
        <div class="modal-content">
          <div class="box">
            <article class="media" >
                <div class="media-content">       
                  <div class="content">               
                    <p class="title is-6 has-text-black"> Productos Comestibles </p>
                    <p>  Producto Barato 1</p> 
                    <p>  Producto Barato 2</p>  
                    <p>  Producto Barato 3</p>                
                  </div>                 
                </div> 
                <div class="media-content">       
                  <div class="content"> 
                    <p class="title is-6 has-text-black"> Productos Toxicos </p>              
                    <p>  Producto Barato 1</p> 
                    <p>  Producto Barato 2</p>  
                    <p>  Producto Barato 3</p>                
                  </div>                 
                </div>                 
            </article>                
          </div>
          <button class="button is-danger is-small" id="closebtn">Close Modal</button>                
        </div>                
        <button class="modal-close is-large" aria-label="close"></button>                
      </div> 

      <button class="button is-danger is-large" id="lanuchModal">Revisa nuestros productos mas baratos (pobre qlo)</button>
    </div>

    <div class="tile is-child box">
      <form align="center" action="" method="post">
        <div class="field-body">
            <div class="field">
                <p class="control">
                    <input class="input" type="text" placeholder="Busca un Producto" name="nombre">
                </p>
            </div>
        </div>
        <br/><br/>
        <input class="button is-danger" type="submit" value="Buscar" >
      </form>

      <?php 
    if(isset($_POST['nombre'])){

      echo $_POST['nombre'];

    }

    ?>
    </div>

    <div class="tile is-child box">
        <form align="center" action="" method="post">
          <div class="field-body">
              <div class="field">
                  <p class="control">
                      <input class="input" type="text" placeholder="Ingresa un ID" name="id">
                  </p>
              </div>
          </div>
          <br/><br/>
          <input class="button is-danger" type="submit" value="Consultar Disponibilidad" >
        </form>

        <?php 
      if(isset($_POST['id'])){

        echo $_POST['id'];

      }

      ?>
      </div>
  </div>
 
          


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


</div>

</body>







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