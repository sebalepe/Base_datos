<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $nombre = $_POST["nombre"];
  $contraseña = $_POST["contraseña"];
 	$query = "SELECT nombre, contraseña FROM usuarios where usuarios.nombre = '$nombre';";


	$result = $db2 -> prepare($query);
	$result -> execute();
	$usuario = $result -> fetchAll();
	$largo = count($usuario);
  ?>

  <?php if ($largo == 0): ?>
    <p> nombre de usuario incorrecto </p>

  <?php else: ?>
    <?php if ($contraseña <> $usuario[1]): ?>
    <p> contraseña incorrecta </p>
    <?php else: ?>
        <?php session_start();
        $_SESSION['current'] = $usuario[0];
        ?>
        
    <?php endif ?>
  <?php endif ?>

<?php include('../templates/footer.html'); ?>