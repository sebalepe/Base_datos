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

  <h3 align="center">Ingrese un tipo de veh ́ıculo y seleccione dos nu ́meros.
  Muestre todos los despachos realizados por un veh́ıculo del tipo ingresado,
  y cuyo repartidor tiene una edad entre el rango seleccionado.?</h3>

  <form align="center" action="consultas/tipo_vehiculo_edad.php" method="post">
    <div class="form-group" style="margin-left:600px;width: 200px;" align="center">
      <label> Tipo </label>
      <select class="form-control" name="tipo">
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
    <input type="submit" value="Buscar">
  </form>
  <br>
  <br>
  <br>

  <h3 align="center">Ingrese dos comunas. Encuentre los jefes de las unidades que realizan despachos a ambas comunas.?</h3>

  <form align="center" action="consultas/jefes_comunas.php" method="post">
    Comuna1:
    <input type="text" name="comuna1">
    <br/><br/>
    Comuna2:
     <input type="text" name="comuna2">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>
  <br>
  <br>
  <br>

  <h3 align="center">Ingrese un tipo de veh ́ıculo. Encuentre la unidad qu ́e maneja ma ́s veh ́ıculos de ese tipo?</h3>
  <form align="center" action="consultas/max_tipo.php" method="post">
    <div class="form-group" style="margin-left:600px;width: 200px;" align="center">
      <label> Tipo </label>
      <select class="form-control" name="tipo">
        <option>Auto</option>
        <option>Moto</option>
        <option>Camioneta</option>
        <option>Bicicleta</option>
        <option> Camion</option>
      </select>
    </div>
    <input type="submit" value="Buscar">
  </form>
  <br>
  <br>
  <br>

</body>
</html>
