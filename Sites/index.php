<?php include('templates/header.html');   ?>

<body>
  <section class="hero is-danger is-fullheight">
    <br>
    <div align="center">
      <img class="image" src='storage/espada1.png' onmouseover="this.src='storage/espada2.png';" onmouseout="this.src='storage/espada1.png';" width="300" height="300" />
    </div>
    <br>
    <br>
    <div class="hero-head">
        <h1 class="title is-1" align="center">CheemsCO </h1>
          <p class='subtitle is-5' style="text-align:center;">
            Todo lo que necesitas para administrar tu negocio
          </p>
    </div>
    <div class="hero-body">
          <div class="tile is-ancestor">
            <div class="tile is-parent is-2">
            </div>
            <div class="tile is-parent is-12 is-vertical">
              <div class="tile is-8 is-child box">
                <h3 class="title is-4 has-text-black" align="center">
                 Muestre las direcciones de todas las mis Unidades
                </h3>

                <form align="center" action="consultas/direcciones_unidades.php" method="post">
                  <input class="button is-danger" type="submit" value="Buscar" >
                </form>
              </div>
              <div class="tile is-8 is-child box">
                <h3 class="title is-4 has-text-black" align="center">
                  Elige una comuna y verás los vehículos que se encuentran disponibles en esta.
                </h3>
                <div align="center">
                  <form align="center" action="consultas/vehiculos_comuna.php" method="post">
                    <div class="field-body">
                        <div class="field">
                            <p class="control">
                                <input class="input" type="text" placeholder="Ingresa una comuna" name="comuna_elegida">
                            </p>
                        </div>
                    </div>
                    <br/><br/>
                    <input class="button is-danger" type="submit" value="Buscar" >
                  </form>
                </div>
              </div>
              <div class="tile is-8 is-child box">
                <h3 class="title is-4 has-text-black" align="center"> Ingrese una comuna y selecciona un año. se mostraran los vehículos
                que realizaron un despacho con estas características</h3>

                <div align="center">
                  <form align="center" action="consultas/despacho_año_comuna.php" method="post">
                    <div class="field-body">
                        <div class="field">
                            <p class="control">
                                <input class="input" type="text" placeholder="Ingresa una comuna" name="comuna">
                            </p>
                        </div>
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
                <h3 class="title is-4 has-text-black" align="center">Ingrese un tipo de vehículo y seleccione dos edades. Se mostrará
                los despachos realizados por un repartidor en ese rango de edades y con su respectivo tipo de vehículo.
                </h3>
                <div align="center">
                  <form align="center" action="consultas/tipo_vehiculo_edad.php" method="post">
                    <label> Tipo: </label>
                    <div class="select">
                      <?php
                        require("config/conexion.php");
                        $query = "SELECT DISTINCT(tipo) from vehiculos";
                        $result = $db -> prepare($query);
                        $result -> execute();
                        $tipos = $result -> fetchAll(); 
                      ?>
                      <select name="tipo">
                        <?php 
                          foreach ($tipos as $tipo) {
                            echo "<option> $tipo[0] </option>";
                          }
                        ?>
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
              <h3 class="title is-4 has-text-black" align="center">Ingrese dos comunas. Se mostrarán los jefes que hacen despachos a
              ambas comunas</h3>
                <div align="center">
                  <form align="center" action="consultas/jefes_comunas.php" method="post">
                    <div class="field-body">
                        <div class="field">
                            <p class="control">
                                <input class="input" type="text" placeholder="Ingresa una comuna" name="comuna1">
                            </p>
                        </div>
                    </div>
                    <br/><br/>
                    <div class="field-body">
                        <div class="field">
                            <p class="control">
                                <input class="input" type="text" placeholder="Ingresa una comuna diferente" name="comuna2">
                            </p>
                        </div>
                    </div>
                    <br/><br/>
                    <input class="button is-danger" type="submit" value="Buscar">
                  </form>
                </div>
              </div>
              <div class="tile is-8 is-child box">
                <h3 class="title is-4 has-text-black" align="center">Ingrese un tipo de vehículo. Se mostrará la unidad que maneja
                más vehículos de este tipo</h3>
                <div align="center">
                  <form align="center" action="consultas/max_tipo.php" method="post">
                    <label> Tipo: </label>
                    <div class="select" align="center">
                      <select name="tipo">
                        <?php 
                          foreach ($tipos as $tipo) {
                            echo "<option> $tipo[0] </option>";
                          }
                        ?>
                      </select>
                    </div>
                    <input class="button is-danger" type="submit" value="Buscar">
                  </form>
                </div>
              </div>
            </div>
            <div class="tile is-parent is-2">
            </div>
          </div>
        <br/><br/>
        <br/><br/>
        <br/><br/>
    </div>
  </section>
</body>
</html>
