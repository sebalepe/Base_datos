<?php
  try {
    #Pide las variables para conectarse a la base de datos.
    require('data.php'); 
    # Se crea la instancia de PDO
    $db = new PDO("pgsql:dbname=$grupo62e2;host=localhost;port=5432;user=$grupo62;password=$grupo62");
  } catch (Exception $e) {
    echo "No se pudo conectar a la base de datos: $e";
  }
?>
