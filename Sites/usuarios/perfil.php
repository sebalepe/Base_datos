<?php 
	session_start();
	$rut = $_SESSION['current_user'];
	$jefe  = $_SESSION['boss'];
?>


<?php include('../templates/header.html');   ?>
<?php include('../templates/navbar.html');   ?>

<body>
<section class="hero is-danger is-fullheight">
<?php
  	require("../config/conexion.php");
	$query = "SELECT nombre, edad, rut, direccion, id FROM usuarios where rut = '$rut';";
	$result = $db2 -> prepare($query);
	$result -> execute();
	$info = $result -> fetchAll();
	$info2 = $info[0];
	$id = $info2[4];


	$direct_id = intval($info2[3]);

	$query = "SELECT direccion, comuna FROM direcciones where id = $direct_id ;";
	$result = $db2 -> prepare($query);
	$result -> execute();
	$dir = $result -> fetchAll();
	$direccion = $dir[0][0];
	$comuna = $dir[0][1];

  ?>
<br>
<div align="center">
	<p class='title is-2'> Bienvenido a Tu Perfil! </p>

	<?php 
	echo "<p class='subtitle is-4'> $info2[0] pasalo bien </p> ";
	?>

	<p> <a class="button is-info" href="http://codd.ing.puc.cl/~grupo62/usuarios/user_edit.php">Editar mi Perfil</a> </p>

	<div class='tile is-ancestor m-6'>
		<div class='tile is-parent is-vertical'>
			<div class='tile is-child box m-3'>
				<?php 
				for ($i=0; $i<1; $i++) {
			        echo "<p> Nombre: ". $info[$i][0] . "</p>";
			        echo "<p> Edad: ". $info[$i][1] . "</p>";
			        echo "<p> Rut: ". $info[$i][2] . "</p>";
			        echo "<p> Direccion: ". $direccion . "</p>";
			        echo "<p> Comuna: ". $comuna . "</p>";
			    }
				?>
			</div>
			<div class='tile is-child m-3 box'>
			<p class="subtitle is-5 has-text-black"> 
				Tus compras:
			</p>
			<?php 
				$query = "SELECT id_producto, cantidad_producto
						FROM compras where id_comprador = '$id' order by id desc;";
				$result = $db2 -> prepare($query);
				$result -> execute();
				$compras = $result -> fetchAll();

				$query = "SELECT id FROM comestibles ;";
				$result = $db2 -> prepare($query);
				$result -> execute();
				$id_comestibles = $result -> fetchAll();

				$value = 0;

				foreach ($compras as $compra) {
				    foreach ($id_comestibles as $id_com){
				        if ($compra[0] == $id_com[0]){
				            $value = 1;
				        }
				    }
				    if ($value == 1){
				        $query = "SELECT nombre, precio FROM comestibles where id = $compra[0];";
				        $result = $db2 -> prepare($query);
				        $result -> execute();
				        $info_compra = $result -> fetchAll();
				        foreach ($info_compra as $info){

				            echo "
				            	<p>
					            	<div class='columns'>
					            		<div class='column'>
							            	<p> Nombre: $info[0] </p>
							                <p> Precio: $info[1] </p>
							                <p> Cantidad: $compra[1]  </p>
							            </div>
							            <div class='column'>
							            	<form align='center' action='../Tiendas/eateable.php' method='post'>
											    <button class='button is-danger' name='id' type='submit' value='$compra[0]'> Ver Producto 
											    </button>
											</form>
							            </div>
						            </div>
						        </p>
				                ";
				        }
				    }
				    elseif ($value == 0){
	
				        $query = "SELECT nombre, precio FROM no_comestibles where id = $compra[0];";
				        $result = $db2 -> prepare($query);
				        $result -> execute();
				        $info_compra2 = $result -> fetchAll();
				        foreach ($info_compra2 as $info2){
				            echo "
				            	<div class='columns'>
				            		<div class='column'>
						            	<p> Nombre: $info2[0] </p>
						                <p> Precio: $info2[1] </p>
						                <p> Cantidad: $compra[1]  </p>
						            </div>
						            <div class='column'>
						            	<form align='center' action='../Tiendas/toxic.php' method='post'>
										    <button class='button is-danger' name='id' type='submit' value='$compra[0]'> Ver Producto 
										    </button>
										</form>
						            </div>
					            </div>
				                ";
				        }
				    }
				}
			?>
			</div>
			    <?php if ($jefe == 1): ?>
			        <?php
			        echo"
			        <div class='tile is-child m-3 box'>
			            <p class='subtitle is-5 has-text-black'>
				            Que onda viejo, aqui estan tus soldados:
			            </p>";
                        $query = "SELECT unidad, nombre FROM unidades, direcciones, (SELECT unidad FROM personal, p_clasificados where personal.rut = '$rut' and personal.rut = p_clasificados.rut) as jefe_uni
                                  where unidades.uid = jefe_uni.unidad and unidades.direccion_id = direcciones.id;";

                        $result = $db -> prepare($query);
                        $result -> execute();
                        $unidad = $result -> fetchAll();
                        $uni = $unidad[0][0];
                        $direc_boss = $unidad[0][1];

                        echo"
			                <p class='subtitle is-5 has-text-black'>
				                Direccion de tu Unidad: $direc_boss
			                </p>";


                        $query = "SELECT nombre FROM personal, p_clasificados where personal.rut = p_clasificados.rut and unidad = '$uni' and p_clasificados.rut <> '$rut';";

                        $result = $db -> prepare($query);
                        $result -> execute();
                        $nombres_clasi = $result -> fetchAll();
                        $len = count($nombres_clasi);

                        $value = 0;

                    ?>
                        <?php foreach ($nombres_clasi as $nombre):?>
                            <div class='columns'>
                                <div class='column'>
                                    <p> <?php echo $nombres_clasi[$value][0]; ?></p>
                                    <?php $value = $value + 1;?>
                                </div>
                                <div class='column'>
                                    <p> <?php echo $nombres_clasi[$value][0]; ?></p>
                                    <?php $value = $value + 1;?>
                                </div>
                                <div class='column'>
                                    <p> <?php echo $nombres_clasi[$value][0]; ?></p>
                                    <?php $value = $value + 1;?>
                                </div>
                            </div>
                        <?php endforeach; ?>
			        </div>
			    <?php endif; ?>
		</div>
	</div>
</div>

</section>

<?php include('../templates/footer.html'); ?>