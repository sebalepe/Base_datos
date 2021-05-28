<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $comuna = $_POST["comuna"];
  $comuna = strtolower($comuna);
  $año = $_POST["año"];


  
 	$query = "SELECT * FROM vehiculos,(SELECT vehiculo FROM direcciones,
 	(SELECT * FROM despacho WHERE CAST(fecha AS text) LIKE '$año%') AS año_vehi
 	WHERE año_vehi.id_destino = direcciones.id AND direcciones.comuna LIKE '%$comuna%') AS v_año
 	WHERE vehiculos.id = v_año.vehiculo;";

 
	$result = $db -> prepare($query);
	$result -> execute();
	$vehiculos = $result -> fetchAll();
	$largo = count($vehiculos);
  ?>

  <?php if ($largo > 0 ): ?>
      <table class = 'table'>

        <tr>
          <th>ID</th>
          <th>Patente</th>
          <th>Estado</th>
          <th>Tipo</th>
          <th>Unidad</th>
        </tr>

          <?php
            foreach ($vehiculos as $vehiculo) {
              echo "<tr>
                        <td>$vehiculo[0]</td>
                        <td>$vehiculo[1]</td>
                        <td>$vehiculo[2]</td>
                        <td>$vehiculo[3]</td>
                        <td>$vehiculo[4]</td>
                        <td>$vehiculo[5]</td>
                        <td>$vehiculo[6]</td>
                        <td>$vehiculo[7]</td>
                    </tr>";
          }
          ?>

      </table>
  <?php else: ?>
  <p> ups, no se encuentran ningun vehiculo que haya realizado este tipo de despacho </p>
  <?php endif ?>

<?php include('../templates/footer.html'); ?>
