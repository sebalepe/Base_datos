<?php 
  session_start();
?>


<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $rut = $_POST["rut"];
  $contraseña = $_POST["contraseña"];
 	$query = "SELECT rut, contraseña, es_jefe FROM usuarios where rut = '$rut';";


	$result = $db2 -> prepare($query);
	$result -> execute();
	$usuario = $result -> fetchAll();
	$largo = count($usuario);
?>

  <?php if ($largo == 0): ?>
    <p> rut no encontrado </p>

  <?php else: ?>
    <?php if ($contraseña <> $usuario[0][1]): ?>
    <p> contraseña incorrecta </p>
    <?php else: ?>
        <?php 
        $_SESSION['current_user'] =  $usuario[0][0];
        $_SESSION['current_password'] =  $usuario[0][1];
        $_SESSION['boss'] = $usuario[0][2];
        ?>
        <meta http-equiv="refresh" content="0;url=../home.php">
    <?php endif ?>
  <?php endif ?>
</body>