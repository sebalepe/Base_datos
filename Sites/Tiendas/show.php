<?php
  session_start();
?>


<?php include('../templates/header.html');   ?>
<?php include('../templates/navbar.html');   ?>

<body>
<section class="hero is-danger is-fullheight">

<?php
  
  require("../config/conexion.php");

  
  $id = $_POST["id"];
  if(strlen($id) <> 0){
    $_SESSION['tienda_actual'] = $id;
  }

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
                        $id = $_SESSION['tienda_actual'];
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
                        $id = $_SESSION['tienda_actual'];
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
        $id = $_SESSION['tienda_actual'];
        $nombre = $_POST['nombre'];
        $nombre = strtolower($nombre);
      
        $query = "SELECT nombre, descripcion, precio, id FROM comestibles 
                  where nombre like '%$nombre%' and id_tienda = $id;";
        $result = $db2 -> prepare($query);
        $result -> execute();
        $comestibles = $result -> fetchAll(); 

        $query = "SELECT nombre, descripcion, precio, id FROM no_comestibles 
                  where nombre like '%$nombre%' and id_tienda = $id;";
        $result = $db2 -> prepare($query);
        $result -> execute();
        $no_comestibles = $result -> fetchAll();

        $len1 = count($comestibles);
        $len2 = count($no_comestibles);

        foreach ($comestibles as $com) {
          echo "<p>  
                  <div class='columns'>
                    <div class='column'>
                      <p> $com[0]: $com[1] </p>
                    </div>
                    <div class='column'>
                      <p> $: $com[2] </p>
                    </div>
                    <div class='column'>
                      <button class='button is-danger'> Comprar </button>
                    </div>
                    <div class='column'>
                      <button class='button is-danger'> Agregar al Carrito </button>
                    </div>
                  </div> 
                </p>";
        }
        foreach ($no_comestibles as $com) {
          echo "<p>  
                  <div class='columns'>
                    <div class='column'>
                      <p> $com[0]: $com[1] </p>
                    </div>
                    <div class='column'>
                      <p> $: $com[2] </p>
                    </div>
                    <div class='column'>
                      <button class='button is-danger'> Comprar </button>
                    </div>
                    <div class='column'>
                      <button class='button is-danger'> Agregar al Carrito </button>
                    </div>
                  </div> 
                </p>";
        }

        if($len1 == 0 and $len2 == 0){
          echo "<p> No vendemos el producto $nombre </p>";
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
        $id_producto = $_POST['id2'];
        $id = $_SESSION['tienda_actual'];
        $rut = $_SESSION['current_user'];

        
        $query = "SELECT direccion from usuarios
                  where rut = '$rut' ;"; 
        $result = $db2 -> prepare($query);
        $result -> execute();
        $direcciones = $result -> fetchAll();
        $comuna = $direcciones[0]; 
        $id_comuna = $comuna[0]; 
        echo count($comunas);
        $id_comuna = intval($n_comuna); 


        $query = "SELECT direcciones.comuna from direcciones
                  where  direcciones.id = $id_comuna;"; 
        $result = $db2 -> prepare($query);
        $result -> execute();
        $comunas = $result -> fetchAll();
        $comuna = $comunas[0]; 
        $n_comuna = $comuna[0]; 
        echo count($comunas);
        
        $query = "SELECT comunas from tiendas 
                  where id = '$id';";  
        $result = $db2 -> prepare($query);
        $result -> execute();
        $comunas = $result -> fetchAll();
        $lista_comunas = $comunas[0]; 
        $l_comunas = $lista_comunas[0]; 
        $comunas = explode(",", $l_comunas);
    
        if (in_array($n_comuna, $comunas)){
          echo "weeena";
        }




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