<?php

#-------------------------------https://stackoverflow.com/questions/4356289/php-random-string-generator-----
function generateRandomNum($length = 3) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
#-----------------------------------------------------------------------------------------------------------
?>

<?php # Cargar acontraseñas
    #Llama a conexión, crea el objeto PDO y obtiene la variable $db
    require ("../Sites/config/conexion.php");

    #Se construye la consulta como un string
    $query = "SELECT id FROM comestibles;";

    #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
    $result = $db2->prepare($query);
    $result->execute();
    $Comida = $result->fetchAll();
    
    foreach ($Comida as $c) {
        $dato = intval(generateRandomNum()); # Contraseña
        $query = "INSERT INTO comestibles(cantidad) VALUES($dato);";
        $result = $db2 ->prepare($query);
        echo $dato;
        echo $query;
        $result ->execute();
    }

?>