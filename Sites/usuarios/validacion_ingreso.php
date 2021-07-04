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
  echo $contraseña;
 	$query = "SELECT rut, contraseña FROM usuarios where rut = '$rut';";


	$result = $db2 -> prepare($query);
	$result -> execute();
	$usuario = $result -> fetchAll();
	$largo = count($usuario[0]);
  print_r($usuario); 
  ?>

  <?php if ($largo == 0): ?>
    <p> rut no encontrado </p>

  <?php else: ?>
    <?php if ($contraseña <> $usuario[1]): ?>
    <p> contraseña incorrecta </p>
    <?php else: ?>
        <?php 
        $_SESSION['current_user'] =  $usuario[0];
        $_SESSION['current_password'] =  $usuario[1];
        ?>
        <meta http-equiv="refresh" content="0;url=../usuarios/perfil.php">
    <?php endif ?>
  <?php endif ?>

<?php include('../templates/footer.html'); ?>