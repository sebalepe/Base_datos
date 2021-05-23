<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se obtiene el valor del input del usuario
  $comuna = $_POST["comuna"];
  $año = $_POST["año"];

  #Se construye la consulta como un string
 	$query = "SELECT * FROM vehiculos,(SELECT vehiculo FROM direcciones,
 	(SELECT * FROM despacho WHERE CAST(fecha AS text) LIKE '$año%') AS año_vehi
 	WHERE año_vehi.id_destino = direcciones.id AND direcciones.comuna = '$comuna') AS v_año
 	WHERE vehiculos.id = v_año.vehiculo;";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
	$result = $db -> prepare($query);
	$result -> execute();
	$vehiculos = $result -> fetchAll();
	$largo = count($vehiculos);
  ?>

  <?php if ($largo > 0 ): ?>
      <table>
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
                    </tr>";
          }
          ?>

      </table>
  <?php else: ?>
  <p> ups, no se encuentran ningun vehiculo que haya realizado este tipo de despacho </p>
  <?php endif ?>

<?php include('../templates/footer.html'); ?>
