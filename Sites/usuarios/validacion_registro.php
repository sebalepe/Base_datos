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
  if ($validador == 1){
    echo "<p> No se pudo </p>";
  }
   else {
    echo "<p> Sí se pudo </p>";
  }
  ?>

<?php include('../templates/footer.html'); ?>
