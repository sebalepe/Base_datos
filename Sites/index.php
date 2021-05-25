<?php include('templates/header.html');   ?>

<body>
  <br>
  <br>

  <h1 class="title is-1" align="center">Administracion de Unidades </h1>
  <p class='subtitle is-5' style="text-align:center;">
    Todo lo que necesitas para administrar tu negocio
  </p>
  <div class="tile is-ancestor" align="center">
    <div class="tile is-parent is-vertical">
      <div class="tile is-8 is-child box">
        <h3 class="title is-4" align="center">
         Muestre las direcciones de todas las mis Unidades
        </h3>

        <form align="center" action="consultas/direcciones_unidades.php" method="post">
          <input class="button is-danger" type="submit" value="Buscar" >
        </form>
      </div>
      <div class="tile is-8 is-child box">
        <h3 class="title is-4" align="center"> 
          Quieres buscar los vehiculos disponibles en las unidades ubicadas en una comuna en especifico?
        </h3>
        <?php require("config/conexion.php");
          $query = "SELECT DISTINCT(comuna) FROM direcciones;";
          $result = $db -> prepare($query);
          $result -> execute();
          $comunas = $result -> fetchAll();
        ?>
        <div align="center">
          <form align="center" action="consultas/vehiculos_comuna.php" method="post">
            <label> Comuna: </label>
            <div class="select" align="center">
              <select name="comuna_elegida">
                <?php
                    foreach ($comunas as $comuna) {
                      echo "<option>$comuna[0]</option>";
                  }
                  ?>
              </select>
            </div>
            <br/><br/>
            <input class="button is-danger" type="submit" value="Buscar">
          </form>
        </div>
      </div>
      <div class="tile is-8 is-child box">
        <h3 class="title is-4" align="center"> ingrese una comuna y selecciona un año. Muestre todos los vehiculos que hayan realizado un
        despacho a esa comuna en ese año</h3>

        <div align="center">
          <form align="center" action="consultas/despacho_año_comuna.php" method="post">
            <label> Comuna: </label>
            <div class="select" align="center">
              <select  name="comuna">
                <?php
                    foreach ($comunas as $comuna) {
                      echo "<option>$comuna[0]</option>";
                  }
                  ?>
              </select>
            </div>
            <br/><br/>
            <label> Año: </label>
            <input type="number" name="año" min="2000" max="2100">
            <br/><br/>
            <input class="button is-danger" type="submit" value="Buscar">
          </form>
        </div>
      </div>
      <div class="tile is-8 is-child box">
        <h3 class="title is-4" align="center">Ingrese un tipo de veh ́ıculo y seleccione dos nu ́meros.
        Muestre todos los despachos realizados por un veh́ıculo del tipo ingresado,
        y cuyo repartidor tiene una edad entre el rango seleccionado.?</h3>
        <div align="center">
          <form align="center" action="consultas/tipo_vehiculo_edad.php" method="post">
            <label> Tipo: </label>
            <div class="select">
              <select name="tipo">
                <option>Auto</option>
                <option>Moto</option>
                <option>Camioneta</option>
                <option>Bicicleta</option>
                <option> Camion</option>
              </select>
            </div>
            <br/><br/>
            Rango Edades:
            <input type="number" name="edad1" min="18" max="100">
            <input type="number" name="edad2" min="18" max="100">
            <br/><br/>
            <input class="button is-danger" type="submit" value="Buscar">
          </form>
        </div>
      </div>
      <div class="tile is-8 is-child box">
      <h3 class="title is-4" align="center">Ingrese dos comunas. Encuentre los jefes de las unidades que realizan despachos a ambas comunas.?</h3>
        <div align="center">
          <form align="center" action="consultas/jefes_comunas.php" method="post">
            <label> Comuna 1: </label>  
            <div class="select" align="center">
              <select name="comuna1">
                <?php
                    foreach ($comunas as $comuna) {
                      echo "<option>$comuna[0]</option>";
                  }
                  ?>
              </select>
            </div>
            <br/><br/>
            <label> Comuna 2: </label>
            <div class="select" align="center">
              <select  name="comuna2">
                <?php
                    foreach ($comunas as $comuna) {
                      echo "<option>$comuna[0]</option>";
                  }
                  ?>
              </select>
            </div>
            <br/><br/>
            <input class="button is-danger" type="submit" value="Buscar">
          </form>
        </div>
      </div>
      <div class="tile is-8 is-child box">
        <h3 class="title is-4" align="center">Ingrese un tipo de veh ́ıculo. Encuentre la unidad qu ́e maneja ma ́s veh ́ıculos de ese tipo?</h3>
        <div align="center">
          <form align="center" action="consultas/max_tipo.php" method="post">
            <label> Tipo: </label>
            <div class="select" align="center">
              <select name="tipo">
                <option>Auto</option>
                <option>Moto</option>
                <option>Camioneta</option>
                <option>Bicicleta</option>
                <option> Camion</option>
              </select>
            </div>
            <input class="button is-danger" type="submit" value="Buscar">
          </form>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
