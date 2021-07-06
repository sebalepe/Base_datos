<?php 
    session_start();
    $rut = $_SESSION['current_user'];
    $contraseña = $_SESSION['current_password'];
?>

<?php include('../templates/header.html');  ?>

<?php 
require("../config/conexion.php");


$old_contraseña = $_POST['old_contraseña'];
$new_contraseña = $_POST['new_contraseña'];
$new_direccion = $_POST['direccion'];
$new_comuna = $_POST['comuna'];


echo "

<section class='hero notification is-fullheight'>
	<div class='tile is-ancestor'>
		<div class='tile is-child box'>
";

if (!empty($old_contraseña) and !empty($new_contraseña)){

	if ($old_contraseña == $contraseña){
		$query = "UPDATE usuarios 
				 set contraseña = '$new_contraseña'
				 where rut = '$rut';";
		$result = $db2 -> prepare($query);
		$result -> execute();
		echo "<p> Contraseña actual actualizada a '$new_contraseña' <p> ";
		$_SESSION['current_password'] =  $new_contraseña;
	}
	else{
		echo "<p> Contraseña actual no concuerda <p>";
	
	}
}

if (!empty($new_direccion)){

	$query = "SELECT direccion from usuarios where rut = '$rut' ;";
	$result = $db2 -> prepare($query);
	$result -> execute();
	$dir = $result -> fetchAll();
	$id_direccion = intval($dir[0][0]);

	$query = "UPDATE direcciones
			  set direccion = '$new_direccion'
			  where id = $id_direccion;";
	$result = $db2 -> prepare($query);
	$result -> execute();
	echo "<p> Direccion actual actualizada a $new_direccion <p> ";
}

if (!empty($new_comuna)){

	$query = "SELECT direccion from usuarios where rut = '$rut' ;";
	$result = $db2 -> prepare($query);
	$result -> execute();
	$dir = $result -> fetchAll();
	$id_direccion = intval($dir[0][0]);

	$query = "UPDATE direcciones
			  set comuna = '$new_comuna'
			  where id = $id_direccion;";
	$result = $db2 -> prepare($query);
	$result -> execute();
	echo "<p> Comuna actual actualizada a $new_comuna <p> ";
}


echo "
		<div class='tile is-child box'>
	<div class='tile is-ancestor'>
	<a class='button is-danger is-medium' href='http://codd.ing.puc.cl/~grupo62/usuarios/perfil.php'>Volver a tu perfil</a>
</section>
";
?>




