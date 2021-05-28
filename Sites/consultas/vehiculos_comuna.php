<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $comuna= $_POST["comuna_elegida"];
  $comuna = strtolower($comuna_elegida);

 	$query = "SELECT * FROM vehiculos (SELECT uid FROM direcciones, unidades WHERE
 	unidades.direccion_id = direcciones.id AND direcciones.comuna LIKE '%$comuna%')
 	as unidades WHERE vehiculos.unidad = unidades.uid;";
  
	$result = $db -> prepare($query);
	$result -> execute();
	$vehiculos = $result -> fetchAll();
    $largo = count($vehiculos);
  ?>

  <?php if ($largo > 0): ?>
  	<table class='table'>
      <tr>
        <th>ID</th>
        <th>patente</th>
        <th>estado</th>
        <th>tipo</th>
        <th>unidad</th>
      </tr>
    <?php
  	foreach ($vehiculos as $vehiculo) {
    		echo "<tr>
                <td>$vehiculo[0]</td>
                <td>$vehiculo[1]</td>
                <td>$vehiculo[2]</td>
                <td>$vehiculo[3]</td>
                <td>$vehiculo[4]</td>
              </tr>";
  	}
    ?>
  	</table>
  <?php else: ?>
    <p> Ups, no hay ninguna unidad en esa Comuna </p>
  <?php endif ?>
  

<?php include('../templates/footer.html'); ?>
