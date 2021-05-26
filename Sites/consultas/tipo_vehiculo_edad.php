<?php include('../templates/header.html');   ?>

<body>

  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db

  $tipo = $_POST["tipo"];
  $tipo = strtolower($tipo);
  $edad1 = $_POST["edad1"];
  $edad2 = $_POST["edad2"];
  if ($edad1 > $edad2):
    $edad1 = $_POST["edad2"];
    $edad2 = $_POST["edad1"];
  endif

  ?>
  <?php if ($tipo = 'camion'): ?>
    <?php  $tipo = ' camion' ?>
  <?php endif ?>

<?php


  $query = "SELECT * FROM vehiculos, despacho, personal WHERE despacho.vehiculo = vehiculos.id AND
  vehiculos.tipo = '$tipo' AND despacho.repartidor = personal.id AND personal.edad BETWEEN $edad1 AND $edad2;";
  $result = $db -> prepare($query);
  $result -> execute();
  $despachos = $result -> fetchAll();
  $largo = count($despachos);
  ?>

  <?php if ($largo > 0 ): ?>
      <table class = 'table'>

        <tr>
          <th>ID</th>
          <th>Fecha</th>
          <th>Id_origen</th>
          <th>Id_destino</th>
          <th>Id_compra</th>
          <th>Vehiculo</th>
          <th>Repartidor</th>
          <th>Edad</th>
        </tr>

          <?php
            foreach ($despachos as $despacho) {
              echo "<tr>
                        <td>$despacho[5]</td>
                        <td>$despacho[6]</td>
                        <td>$despacho[7]</td>
                        <td>$despacho[8]</td>
                        <td>$despacho[9]</td>
                        <td>$despacho[10]</td>
                        <td>$despacho[11]</td>
                        <td>$despacho[16]</td>
                    </tr>";
          }
          ?>

      </table>
  <?php else: ?>
  <p> ups, no se encuentran ningun vehiculo que haya realizado este tipo de despacho </p>
  <?php endif ?>

<?php include('../templates/footer.html'); ?>
