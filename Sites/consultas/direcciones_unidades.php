<?php include('../templates/header.html');   ?>

<body>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

 	$query = "SELECT direcciones.nombre FROM unidades,direcciones WHERE unidades.direccion_id = direcciones.id;";
	$result = $db -> prepare($query);
	$result -> execute();
	$direcciones = $result -> fetchAll();
  ?>

	<table class='table is-striped'>
    <thead>
      <tr>
        <th>direcciones</th>
      </tr>
    </thead>
  <?php
	foreach ($direcciones as $direccion) {
  		echo "<tr> 
                <td>$direccion[0]</td> 
                <td>$direccion[1]</td> 
            </tr>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>
