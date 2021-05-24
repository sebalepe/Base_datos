<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se obtiene el valor del input del usuario
  $comuna1 = $_POST["comuna1"];
  $comuna1 = strtolower($comuna1);
  $comuna2 = $_POST["comuna2"];
  $comuna2 = strtolower($comuna2);


  #Se construye la consulta como un string
 	$query = "SELECT * FROM personal, (SELECT jefe FROM unidades, (SELECT uid FROM zonas WHERE cobertura = '$comuna1' INTERSECT SELECT uid FROM zonas WHERE cobertura = '$comuna2') AS u WHERE unidades.uid = u.uid) AS jefes WHERE personal.id = jefes.jefe;";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
	$result = $db -> prepare($query);
	$result -> execute();
	$jefes = $result -> fetchAll();
	$largo = count($jefes);
  ?>

  <?php if ($largo > 0 ): ?>
      <table class = 'table'>

        <tr>
          <th>ID</th>
          <th>Rut</th>
          <th>Nombre</th>
          <th>Sexo</th>
          <th>Edad</th>
        </tr>

          <?php
            foreach ($jefes as $jefe) {
              echo "<tr>
                        <td>$jefe[0]</td>
                        <td>$jefe[1]</td>
                        <td>$jefe[2]</td>
                        <td>$jefe[3]</td>
                        <td>$jefe[4]</td>
                    </tr>";
          }
          ?>

      </table>
  <?php else: ?>
  <p> ups, no se encuentran ningun jefe de unidad que haga despacho a esas comunas </p>
  <?php endif ?>

<?php include('../templates/footer.html'); ?>