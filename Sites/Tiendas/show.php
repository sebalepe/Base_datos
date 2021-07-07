<?php
  session_start();
?>


<?php include('../templates/header.html');   ?>
<?php include('../templates/navbar.html');   ?>

<body>
<section class="hero is-danger is-fullheight">

<?php
  
  require("../config/conexion.php");

  if (isset($_POST["id"])){
    $id = $_POST["id"];
    $_SESSION['tienda_actual'] = $id;
  }
  if(!isset($_POST["id"])){
    $id = $_SESSION['tienda_actual'];
  }
  
  $query = "SELECT id, direccion, nombre, comunas, comuna_tienda 
            from tiendas where id = '$id' ;"; 
  $result = $db2 -> prepare($query);
  $result -> execute();
  $Tiendas = $result -> fetchAll(); 
  $Tienda = $Tiendas[0];


  $query = "SELECT comunas from tiendas 
                  where id = '$id';";  
  $result = $db2 -> prepare($query);
  $result -> execute();
  $comunas = $result -> fetchAll();
  $lista_comunas = $comunas[0]; 
  $l_comunas = $lista_comunas[0]; 
  $comunas = explode(",", $l_comunas);


  echo "
    <br><br>
    <div align='center'>
        <p class='title is-1'>
            Bienvenido a $Tienda[2] 
        </p>

        <p class='subtitle is-5'>
          20% de descuento con CMR en todos los productos
        </p>
        <p> Hacemos reparto a: ";
  foreach ($comunas as $comuna) {
   echo "
   $comuna, &nbsp
   ";
  }
echo "</p>
    </div>";
?>

<div class="tile is-ancestor m-6">
  <div class="tile is-parent is-vertical m-6">
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
                                <p> $producto[0]: $ $producto[1] 
                                  <form align='center' action='../Tiendas/eateable.php' method='post'>
                                      <button class='button is-danger' name='id' type='submit' value='$producto[2]'> Ver Producto 
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
                                <p> $producto[0]: $ $producto[1] 
                                  <form align='center' action='../Tiendas/toxic.php' method='post'>
                                      <button class='button is-danger' name='id' type='submit' value='$producto[2]'> Ver Producto 
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
      <button class="button is-danger is-large" id="lanuchModal">Revisa nuestros productos más baratos</button>
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
      
        $query = "SELECT nombre, descripcion, precio, id, cantidad FROM comestibles 
                  where nombre like '%$nombre%' and id_tienda = $id;";
        $result = $db2 -> prepare($query);
        $result -> execute();
        $comestibles = $result -> fetchAll(); 

        $query = "SELECT nombre, descripcion, precio, id, cantidad FROM no_comestibles 
                  where nombre like '%$nombre%' and id_tienda = $id;";
        $result = $db2 -> prepare($query);
        $result -> execute();
        $no_comestibles = $result -> fetchAll();

        $len1 = count($comestibles);
        $len2 = count($no_comestibles);

        foreach ($comestibles as $com) {
          echo "<br><br>
                <p>  
                  <div class='columns '>
                    <div class='column'>
                      <p> id: $com[3] </p>
                    </div>
                    <div class='column'>
                      <p> $com[0]: $com[1] </p>
                    </div>
                    <div class='column'>
                      <p> Comestible </p>
                    </div>
                    <div class='column'>
                      <p> $: $com[2] c/u </p>
                    </div>
                    <div class='column'>
                      <p> Nos quedan: $com[4] disponibles </p>
                    </div>
                    <div class='column'>
                      <form align='center' action='eateable.php' method='post'>
                            <button class='button is-danger'   name='id' type='submit' value='$com[3]'> 
                              Ver Producto 
                            </button>
                      </form>
                    </div>
                  </div> 
                </p>";
        }
        foreach ($no_comestibles as $com) {
          echo "<p>  
                  <div class='columns '>
                    <div class='column'>
                      <p> id: $com[3] </p>
                    </div>
                    <div class='column'>
                      <p> $com[0]: $com[1] </p>
                    </div>
                    <div class='column'>
                      <p> No comestible </p>
                    </div>
                    <div class='column'>
                      <p> $: $com[2] c/u </p>
                    </div>
                    <div class='column'>
                      <p> Nos quedan: $com[4] disponibles </p>
                    </div>
                    <div class='column'>
                      <form align='center' action='eateable.php' method='post'>
                            <button class='button is-danger'   name='id' type='submit' value='$com[3]'> 
                              Ver Producto 
                            </button>
                      </form>
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
                    <?php 
                      $query = "SELECT id from comestibles
                                where id_tienda = '$id';"; 
                      $result = $db2 -> prepare($query);
                      $result -> execute();
                      $pro_com = $result -> fetchAll();

                      $query = "SELECT id from no_comestibles
                                where id_tienda = '$id';"; 
                      $result = $db2 -> prepare($query);
                      $result -> execute();
                      $pro_no_com = $result -> fetchAll();

                     ?>
                     <div class="select">
                       <select name="id2" id="cars">
                        <option disabled selected>Selecciona un id </option>
                        <?php foreach ($pro_com as $value): ?>
                          <option> <?php echo "$value[0]"; ?></option>
                        <?php endforeach; ?>
                        <?php foreach ($pro_no_com as $value): ?>
                          <option> <?php echo "$value[0]"; ?></option>
                        <?php endforeach; ?>
                      </select> 
                    </div>
                      <!-- <input class="input" type="text" placeholder="Ingresa un ID" name="id2"> -->
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

        #parte1
        $query = "SELECT cantidad from comestibles
                  where id = '$id_producto' and id_tienda = '$id';"; 
        $result = $db2 -> prepare($query);
        $result -> execute();
        $pro_com = $result -> fetchAll();
        $max_cant = $pro_com[0][0];
        $len1 = count($pro_com);
        $tipo = 0;
        
        if ($len1 == 0){
          $tipo = 1;
        }
        if ($tipo == 1){
          $query = "SELECT cantidad from no_comestibles
                  where id = '$id_producto' and id_tienda = '$id';"; 
          $result = $db2 -> prepare($query);
          $result -> execute();
          $pro_no_com = $result -> fetchAll();
          $max_cant = $pro_no_com[0][0];
        }

        echo " <p> Tenemos disponible este producto </p>";
        #parte2
        $query = "SELECT direccion from usuarios
                  where rut = '$rut' ;"; 
        $result = $db2 -> prepare($query);
        $result -> execute();
        $direcciones = $result -> fetchAll();
        $id_comuna = intval($direcciones[0][0]); 

        $query = "SELECT comuna from direcciones
                  where id = $id_comuna;"; 
        $result = $db2 -> prepare($query);
        $result -> execute();
        $comunas = $result -> fetchAll();
        $n_comuna = $comunas[0][0];
        
        $query = "SELECT comunas from tiendas 
                  where id = '$id';";  
        $result = $db2 -> prepare($query);
        $result -> execute();
        $comunas = $result -> fetchAll();
        $lista_comunas = $comunas[0]; 
        $l_comunas = $lista_comunas[0]; 
        $comunas = explode(",", $l_comunas);
      
    
        if (in_array($n_comuna, $comunas)){
          echo "<p> Si vendo donde tu estas </p>";
            $query = "SELECT id from compras order by id desc limit 1;";  
            $result = $db2 -> prepare($query);
            $result -> execute();
            $ids = $result -> fetchAll();
            $id_compra = $ids[0][0] + 1;
            #tipo = $tipo
            #id_tienda = $id
            #id_producto = $id_producto
            #maxima cantiad = $max_cant
            $query = "SELECT id from usuarios where rut = '$rut';";
            $result = $db2 -> prepare($query);
            $result -> execute();
            $usuarios = $result -> fetchAll(); 
            $id_user = $usuarios[0][0];
            array_push($_SESSION['compra'], intval($id_compra));
            array_push($_SESSION['compra'], intval($id_user));
            array_push($_SESSION['compra'], intval($id));
            array_push($_SESSION['compra'], intval($id_producto));
            array_push($_SESSION['compra'], intval(0));
            array_push($_SESSION['compra'], intval($tipo));
            array_push($_SESSION['compra'], intval($max_cant));

            echo "

            <form align='center' action='' method='post'>
              <div class='field-body'>
                  <div class='field'>
                      <p class='control'>
                        <input class='input' type='number' name='cantidad'>
                      </p>
                  </div>
              </div>
              <br/><br/>
              <input class='button is-danger' type='submit' value='Comprar' >
            </form>

            ";
                   
        }

        else {
          echo "<p> no vendo donde estas </p>";
        }
      }

      if(isset($_POST['cantidad'])){

          $cantidad = $_POST['cantidad'];
          $compra = array_replace($_SESSION['compra'], array(4 => intval($cantidad)));
          echo "<p> procedemos a hacer tu compra de $cantidad productos </p> ";
          $query = "SELECT generar_compra($compra[0], $compra[1], $compra[2], $compra[3], $compra[4], $compra[5], $compra[6]);";
          #$query = "SELECT generar_compra(". intval($id_compra) .", ". intval($id_user) .", ". intval($id) .", ". intval($id_producto) .", ". intval($cantidad) .", ". intval($tipo) .", ". intval($max_cant) .");";
          echo $query;
          
          #$query = "SELECT generar_compra(2001, 2001, 2001, 2001, 2001, 2001, 2001);";
          $result = $db2 -> prepare($query);
          $result -> execute();   
          $_SESSION['compra'] = array();
        
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




<?php include('../templates/footer.html'); ?>

