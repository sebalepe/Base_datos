<?php include('templates/header.html');   ?>

<body>
  <br>
  <br>

  <h1 align="center">Administracion de Unidades </h1>
  <p style="text-align:center;">
    Todo lo que necesitas para administrar tu negocio
  </p>

  <br>

  <h3 align="center">
   Muestre las direcciones de todas las mis Unidades
  </h3>

  <form align="center" action="consultas/direcciones_unidades.php" method="post">
    <input type="submit" value="Buscar">
  </form>
  
  <br>
  <br>
  <br>

  <h3 align="center"> 
    Quieres buscar los vehiculos disponibles en las unidades ubicadas en una comuna en especifico?
  </h3>

  <form align="center" action="consultas/vehiculos_comuna.php" method="post">
    Comuna:
    <input type="text" name="comuna_elegida">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>
  
  <br>
  <br>
  <br>

  <h3 align="center"> ingrese una comuna y selecciona un año. Muestre todos los vehiculos que hayan realizado un
  despacho a esa comuna en ese año</h3>

  <form align="center" action="consultas/despacho_año_comuna.php" method="post">
    Comuna:
    <input type="text" name="comuna">
    <br/><br/>
    Año:
    <input type="text" name="año">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>
  <br>
  <br>
  <br>

  <h3 align="center">¿Quieres buscar todos los pokemones por tipo?</h3>

<!--
  <?php
  #Primero obtenemos todos los tipos de pokemones
  require("config/conexion.php");
  $result = $db -> prepare("SELECT DISTINCT tipo FROM pokemones;");
  $result -> execute();
  $dataCollected = $result -> fetchAll();
  ?>

  <form align="center" action="consultas/consulta_tipo.php" method="post">
    Seleccinar un tipo:
    <select name="tipo">
      <?php
      #Para cada tipo agregamos el tag <option value=value_of_param> visible_value </option>
      foreach ($dataCollected as $d) {
        echo "<option value=$d[0]>$d[0]</option>";
      }
      ?>
    </select>
    <br><br>
    <input type="submit" value="Buscar por tipo">
  </form>
-->
  <br>
  <br>
  <br>
  <br>
</body>
</html>
