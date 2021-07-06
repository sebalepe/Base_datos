<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $rut = $_POST["rut"];
    $query = "SELECT rut FROM usuarios;";

    $result = $db2 -> prepare($query);
    $result -> execute();
    $ruts = $result -> fetchAll();
  ?>

  <?php
  $validador = 0;
  foreach ($ruts as $r){
    if ($r[0] == $rut){
        $validador = $validador + 1;
    }
  }
  if ($validador > 0){
    echo "<p> No se pudo </p>";
  }
   else {
    $query = "SELECT id FROM direcciones;";
    $result = $db2 -> prepare($query);
    $result -> execute();
    $ids = $result -> fetchAll();
    $cantidad = count($ids) + 1;
    $id_direccion = $cantidad
    $query = "INSERT INTO direcciones(id, direccion, comuna) VALUES (". intval($cantidad) .", '". $_POST["direccion"] ."', '". $_POST["comuna"] ."');";
    $result = $db2 -> prepare($query);
    $result -> execute();

    $query = "SELECT id FROM usuarios;";
    $result = $db2 -> prepare($query);
    $result -> execute();
    $ids = $result -> fetchAll();
    $cantidad = count($ids) + 1;
    $query = "INSERT INTO usuarios(rut, direcciones, nombre, edad, sexo, direccion, id, contraseña, es_jefe, carrito) VALUES ('". $_POST["rut"] ."', '', '". $_POST["nombre"] ."', ". intval($_POST["edad"]) .", '". $_POST["sexo"] ."', ". intval($id_direccion) .", ". intval($cantidad) .", '". $_POST["contraseña"] ."', 0, '');";
    $result = $db2 -> prepare($query);
    $result -> execute();

    echo "<p> ¡Registrado exitosamente! </p>";
  }
  ?>

<?php include('../templates/footer.html'); ?>
