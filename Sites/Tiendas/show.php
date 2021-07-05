<?php include('../templates/header.html');   ?>
<?php include('../templates/navbar.html');   ?>

<body>
<section class="hero is-danger is-fullheight">

<?php
  
  require("../config/conexion.php");

  
  $id = $_POST["id"];

  $query = "SELECT id, direccion, nombre, comunas, comuna_tienda 
            from tiendas where id = '$id' ;";

 
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
<div class="tile is-ancestor">
  <div class="tile is-parent is-vertical">
    <div align="center" class="tile is-child box">
      <div id="modal" class="modal">
        <div class="modal-background"></div>
        <div class="modal-content">
            <article class="media notification" >
                <div class="media-content">       
                  <div class="content">               
                    <p class="title is-6 has-text-black"> Productos Comestibles </p>
                    <?php 
                        $id = $Tienda[0];
                        $query = "SELECT nombre, precio, id  from comestibles where id_tienda = '$id' 
                                  order by precio limit 3;";
                        $result = $db2 -> prepare($query);
                        $result -> execute();
                        $productos = $result -> fetchAll(); 
                        
                        foreach ($productos as $producto) {
                          echo "
                                <p> $producto[0], $producto[1] 
                                  <form align='center' action='../Tiendas/eateable.php' method='post'>
                                      <button class='button is-danger' name='id' type='submit' value='$product[2]'> Ver Producto 
                                      </button>
                                  </form>  
                                </p>                       
                          ";
                        }

                    ?>
                  </div>                 
                </div> 
                <div class="media-content">       
                  <div class="content"> 
                    <p class="title is-6 has-text-black"> Productos Toxicos </p>              
                    <?php 
                        $id = $Tienda[0];
                        $query = "SELECT nombre, precio, id  from no_comestibles where id_tienda = '$id' 
                                  order by precio limit 3;";
                        $result = $db2 -> prepare($query);
                        $result -> execute();
                        $productos = $result -> fetchAll(); 
                        
                        foreach ($productos as $producto) {
                          echo "
                                <p> $producto[0], $producto[1] 
                                  <form align='center' action='../Tiendas/toxic.php' method='post'>
                                      <button class='button is-danger' name='id' type='submit' value='$product[2]'> Ver Producto 
                                      </button>
                                  </form>  
                                </p>                       
                          ";
                        }
                    ?>               
                  </div>                 
                </div>                 
            </article>                
          <button class="button is-danger is-small" id="closebtn">Close Modal</button>                
        </div>                
        <button class="modal-close is-large" aria-label="close"></button>                
      </div> 
      <button class="button is-danger is-large" id="lanuchModal">Revisa nuestros productos mas baratos (pobre qlo)</button>
    </div>

    <div class="tile is-child box m-6">
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
        $nombre = $_POST['nombre'];
      
      $query = "SELECT id FROM comestibles ;";
      $result = $db2 -> prepare($query);
      $result -> execute();
      $id_comestibles = $result -> fetchAll();

      $query = "SELECT id FROM no_comestibles ;";
      $result = $db2 -> prepare($query);
      $result -> execute();
      $id_no_comestibles = $result -> fetchAll();

      $value = 0;

      foreach ($compras as $compra) {
          foreach ($id_comestibles as $id_com){
              if ($compra[0] == $id_com[0]){
                  $value = 1;
              }
          }
      }

      foreach ($compras as $compra) {
          foreach ($id_no_comestibles as $id_com){
              if ($compra[0] == $id_com[0]){
                  $value = 2;
              }
          }
      }
      if ($value == 1){
        $query = "SELECT nombre, descripcion, precio FROM comestibles where 
                  nombre like '%$nombre%' and id_tienda = $id;";
        $result = $db2 -> prepare($query);
        $result -> execute();
        $comestibles = $result -> fetchAll();
        foreach ($comestibles as $comestible) {
          echo "
              <p> 
              <div class='columns'>
                <div class='column'>
                  $comestible[0] : $comestible[1]
                </div>
                <div class='column'>
                  $comestible[2]
                </div
              </div>
              </p>
          ";
        }
      }

      elseif ($value == 2){
        $query = "SELECT nombre, descripcion, precio FROM no_comestibles where 
                  nombre like '%$nombre%' and id_tienda = $id;";
        $result = $db2 -> prepare($query);
        $result -> execute();
        $no_comestibles = $result -> fetchAll();
        foreach ($no_comestibles as $no_omestible) {
          echo "
              <p> 
              <div class='columns'>
                <div class='column'>
                  $no_comestible[0] : $no_comestible[1]
                </div>
                <div class='column'>
                  $no_comestible[2]
                </div
              </div>
              </p>
          ";
        }
      }
   
    ?>
    </div>

    <div class="tile is-child box m-6">
        <form align="center" action="" method="post">
          <div class="field-body">
              <div class="field">
                  <p class="control">
                      <input class="input" type="text" placeholder="Ingresa un ID" name="id2">
                  </p>
              </div>
          </div>
          <br/><br/>
          <input class="button is-danger" type="submit" value="Consultar Disponibilidad" >
        </form>

        <?php 
      if(isset($_POST['id2'])){

        echo $_POST['id2'];

      }

      ?>
      </div>
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



</section>
</body>



<?php include('../templates/footer.html'); ?>