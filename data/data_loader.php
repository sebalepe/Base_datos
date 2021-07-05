<?php
function send_base_62($valor)
{
    $conn = @pg_connect("dbname=grupo62e3 user=grupo62 password=grupo62");
    $envio = @pg_query($conn, strval($valor));
    return $envio;
}
?>
<?php
function send_base_87($valor)
{
    $conn = @pg_connect("dbname=grupo87e3 user=grupo87 password=grupo87");
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

<?php # Cargar acontraseñas
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
        send_base_62("UPDATE personal SET contraseña='". $dato ."' WHERE rut='" . $r[0] . "';");
    }

?>


<?php# Cargar jefes
    require ("../Sites/config/conexion.php"); 

    #Se construye la consulta como un string
    $query = "SELECT rut FROM personal;";

    #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
    $result = $db->prepare($query);
    $result->execute();
    $Personal = $result->fetchAll();
    foreach ($Personal as $p) {
        send_base_62("UPDATE personal SET es_jefe=0 WHERE rut='" . $p[0] . "';");
    }
    #Llama a conexión, crea el objeto PDO y obtiene la variable $db
    require ("../Sites/config/conexion.php");

    #Se construye la consulta como un string
    $query = "SELECT clasificacion,rut FROM p_clasificados;";

    #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
    $result = $db->prepare($query);
    $result->execute();
    $Clasificados = $result->fetchAll();

    foreach ($Clasificados as $c) {
        if (strval($c[0]) == "administracion"){
            send_base_62("UPDATE personal SET es_jefe=1 WHERE rut='" . $c[1] . "';");
        } else {
            send_base_62("UPDATE personal SET es_jefe=0 WHERE rut='" . $c[1] . "';");
        }
    }
   
?>

<?php # Migrar personal
    require ("../Sites/config/conexion.php"); 

    #Se construye la consulta como un string
    $query = "SELECT * FROM personal;";

    #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
    $result = $db->prepare($query);
    $result->execute();
    $Personal = $result->fetchAll();
    foreach ($Personal as $p) {
        send_base_62("UPDATE personal SET es_jefe=0 WHERE rut='" . $p[0] . "';");
        echo "<p>". $p[0] ."</p>";
    }
?>

