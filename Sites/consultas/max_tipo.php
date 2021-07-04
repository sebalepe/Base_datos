<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se obtiene el valor del input del usuario
  $tipo = $_POST["tipo"];
  $tipo = strtolower($tipo);
?>
  <?php if ($tipo == 'camion'): ?>
    <?php  $tipo = ' camion' ?>
  <?php endif ?>

<?php
  #Se construye la consulta como un string
 	$query = "SELECT * FROM (SELECT * FROM unidades, (SELECT count(tipo), unidad FROM vehiculos
 	WHERE tipo LIKE '%$tipo%' GROUP BY unidad) AS cantidad WHERE cantidad.unidad = unidades.uid)
 	AS und, (SELECT max(cantidad.count) AS max_c FROM unidades, (SELECT count(tipo), unidad FROM vehiculos
 	WHERE tipo LIKE '%$tipo%' GROUP BY unidad) AS cantidad WHERE cantidad.unidad = unidades.uid)
 	AS max WHERE und.count = max.max_c;";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
	$result = $db -> prepare($query);
	$result -> execute();
	$unidades = $result -> fetchAll();
	$largo = count($unidades);
  ?>

  <?php if ($largo > 0 ): ?>
      <table class = 'table'>

        <tr>
          <th>UID</th>
          <th>Direccion</th>
          <th>Jefe</th>
          <th>Cantidad <?php echo "$tipo" ?> </th>
        </tr>

          <?php
            foreach ($unidades as $unidad) {
              echo "<tr>
                        <td>$unidad[0]</td>
                        <td>$unidad[1]</td>
                        <td>$unidad[2]</td>
                        <td>$unidad[3]</td>
                    </tr>";
          }
          ?>

      </table>
  <?php else: ?>
  <p> ups, no se encuentran ninguna unidad que tenga autos de ese tipo </p>
  <?php endif ?>

<?php include('../templates/footer.html'); ?>