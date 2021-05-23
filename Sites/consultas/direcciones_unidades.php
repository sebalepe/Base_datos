<?php include('../templates/header.html');   ?>

<body>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

 	$query = "SELECT direccion_id FROM unidades;";
	$result = $db -> prepare($query);
	$result -> execute();
	$direcciones = $result -> fetchAll();
  ?>

	<table>
    <tr>
      <th>direcciones</th>
    </tr>
  <?php
	foreach ($direcciones as $direccion) {
  		echo "<tr> 
                <td>$direccion[0]</td> 
            </tr>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>
