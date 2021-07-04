<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se obtiene el valor del input del usuario
  $id = $_POST["id"];

  echo $id;

  #Se construye la consulta como un string
 	$query = "SELECT * from tiendas where id = '$id' ;"

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
	$result = $db -> prepare($query);
	$result -> execute();
	$Tiendas = $result -> fetchAll();
  $Tienda = $Tiendas[0]
  

  foreach ($Tienda as $value) {
     echo "<p> $value </p>";
  }

  ?>



<?php include('../templates/footer.html'); ?>