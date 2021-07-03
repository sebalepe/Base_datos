<?php
function send($valor)
{
    $conn = @pg_connect("dbname=grupo62e3 user=grupo62 password=grupo62");
    $envio = @pg_query($conn, strval($valor));
    return $envio;
}
?>
<?php

#-------------------------------https://stackoverflow.com/questions/4356289/php-random-string-generator-----
function generateRandomString($length = 30) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
#-----------------------------------------------------------------------------------------------------------
?>

<?php
    #Llama a conexión, crea el objeto PDO y obtiene la variable $db
    require ("../Sites/config/conexion.php");

    #Se construye la consulta como un string
    $query = "SELECT rut FROM personal;";

    #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
    $result = $db->prepare($query);
    $result->execute();
    $Ruts = $result->fetchAll();
    
    foreach ($Ruts as $r) {
        $dato = generateRandomString(); # Contraseña
        send("UPDATE personal SET contraseña='". $dato ."' WHERE rut='" . $r[0] . "';");
    }

?>