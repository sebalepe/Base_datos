<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $comuna_elegida = $_POST["comuna_elegida"];

 	$query = "SELECT * FROM vehiculos, (SELECT uid FROM direcciones, unidades WHERE unidades.direccion_id = direcciones.id AND direcciones.comuna = '$comuna_elegida') as unidades WHERE vehiculos.unidad = unidades.uid;";
  
	$result = $db -> prepare($query);
	$result -> execute();
	$vehiculos = $result -> fetchAll();
  ?>
	<table>
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

<?php include('../templates/footer.html'); ?>
