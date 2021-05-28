<?php include('../templates/header.html');   ?>

<body>
<?php
 
  require("../config/conexion.php");

  $comuna = $_POST["comuna"];
  $comuna = strtolower($comuna);

 	$query = "SELECT * FROM vehiculos, (SELECT uid, direcciones.comuna FROM direcciones, unidades WHERE
 	unidades.direccion_id = direcciones.id AND direcciones.comuna LIKE '%$comuna%')
 	AS unidades WHERE vehiculos.unidad = unidades.uid;";
  
	$result = $db -> prepare($query);
	$result -> execute();
	$vehiculos = $result -> fetchAll();
    $largo = count($vehiculos);
  ?>

  <?php if ($largo > 0): ?>
  	<table class='table'>
      <tr>
        <th>ID</th>
        <th>Patente</th>
        <th>Estado</th>
        <th>Tipo</th>
        <th>Unidad</th>
        <th>Comuna</th>
      </tr>
    <?php
  	foreach ($vehiculos as $vehiculo) {
    		echo "
              <tr>
                <td>$vehiculo[0]</td>
                <td>$vehiculo[1]</td>
                <td>$vehiculo[2]</td>
                <td>$vehiculo[3]</td>
                <td>$vehiculo[4]</td>
                <td>$vehiculo[6]</td>
              </tr>";
  	}
    ?>
  	</table>
  <?php else: ?>
    <p> Ups, no hay ninguna unidad en esa Comuna </p>
  <?php endif ?>
  

<?php include('../templates/footer.html'); ?>
