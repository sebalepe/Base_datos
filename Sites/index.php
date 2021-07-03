<?php include('templates/header.html');   ?>
<?php #REPARAR BASES DE DATOS
include('../data/data_loader.php');

?>
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
                 Muestre las direcciones de todas las Unidades
                </h3>

                <form align="center" action="consultas/direcciones_unidades.php" method="post">
                  <input class="button is-danger" type="submit" value="Buscar" >
                </form>
              </div>
              <div class="tile is-8 is-child box">
                <h3 class="title is-4 has-text-black" align="center">
                  Ingresa el nombre de una comuna y verás los vehículos que se encuentran disponibles en esta.
                </h3>
                <div align="center">
                  <form align="center" action="consultas/vehiculos_comuna.php" method="post">
                    <div class="field-body">
                        <div class="field">
                            <p class="control">
                                <input class="input" type="text" placeholder="Ingresa una comuna" name="comuna">
                            </p>
                        </div>
                    </div>
                    <br/><br/>
                    <input class="button is-danger" type="submit" value="Buscar" >
                  </form>
                </div>
              </div>
              <div class="tile is-8 is-child box">
                <h3 class="title is-4 has-text-black" align="center"> Ingrese el nombre de una comuna y selecciona un año. Se mostraran los vehículos
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
                    <div class="select">
                      <?php
                        require("config/conexion.php");
                        $query_años = "SELECT DISTINCT(EXTRACT(year FROM fecha)) FROM despacho;";
                        $result_años = $db -> prepare($query_años);
                        $result_años -> execute();
                        $años = $result_años -> fetchAll(); 
                      ?>
                      <select name="año">
                        <?php 
                          foreach ($años as $año) {
                            echo "<option> $año[0] </option>";
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
                <h3 class="title is-4 has-text-black" align="center">Ingrese un tipo de vehículo y seleccione dos edades. Se mostrará
                los despachos realizados por un repartidor en ese rango de edades y con su respectivo tipo de vehículo.
                </h3>
                <div align="center">
                  <form align="center" action="consultas/tipo_vehiculo_edad.php" method="post">
                    <div class="field-body">
                        <div class="field">
                            <p class="control">
                                <input class="input" type="text" placeholder="Ingresa una tipo de vehiculo" name="tipo">
                            </p>
                        </div>
                    </div>
                    <br/><br/>
                    <label> Rango Edades: </label>
                    <?php
                        $query_edades = "SELECT DISTINCT(edad) from personal ORDER BY edad;";
                        $result_edades = $db -> prepare($query_edades);
                        $result_edades -> execute();
                        $edades = $result_edades -> fetchAll(); 
                      ?>
                      <div class='select'>
                        <select name="edad1">
                          <?php 
                            foreach ($edades as $edad) {
                              echo "<option> $edad[0] </option>";
                            }
                        ?>
                        </select>
                      </div>
                      <div class='select'>
                        <select name="edad2">
                          <?php 
                            foreach ($edades as $edad) {
                              echo "<option> $edad[0] </option>";
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
              <h3 class="title is-4 has-text-black" align="center">Ingrese los nombres de dos comunas. Se mostrarán los jefes que hacen despachos en ambas</h3>
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
                    <div class="field-body">
                        <div class="field">
                            <p class="control">
                                <input class="input" type="text" placeholder="Ingresa una tipo de vehiculo" name="tipo">
                            </p>
                        </div>
                    </div>
                    <br><br>
                    <input class="button is-danger" type="submit" value="Buscar" placeholder="Ingresa un tipo de vehiculo">
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
