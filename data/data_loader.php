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
<?php # Migrar personal
    require ("../Sites/config/conexion.php");

    #Se construye la consulta como un string
    $query = "SELECT * FROM direcciones;";

    #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
    $result = $db->prepare($query);
    $result->execute();
    $Direcciones = $result->fetchAll();
    $direc = array();
    foreach ($Direcciones as $d) {
        array_push($direc, $d[0]);
        array_push($direc, $d[1]);
    }

<<<<<<< HEAD
    require ("../Sites/config/conexion.php");

    #Se construye la consulta como un string
=======
?>


<?php 
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
    $query = "SELECT * FROM direcciones;";

    #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
    $result = $db->prepare($query);
    $result->execute();
    $Direcciones = $result->fetchAll();
    $direc = array();
    foreach ($Direcciones as $d) {
        array_push($direc, $d[0]);
        array_push($direc, $d[1]);
    }


    require ("../Sites/config/conexion.php");

    #Se construye la consulta como un string
>>>>>>> master
    $query = "SELECT * FROM personal;";

    #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
    $result = $db->prepare($query);
    $result->execute();
    $Personal = $result->fetchAll();
    $contador = 365;
    foreach ($Personal as $p) {
        $dato1 = $contador; #ID
        $contador = $contador + 1; 
        $dato2 = $p[1]; # rut
        $dato3 = $p[2]; # nombre
        $dato4 = substr($p[3], 0, 1); # sexo
        $dato5 = $p[4]; # edad
<<<<<<< HEAD
        $dato6 = $p[5]; # direccion
        for ($i; $i < count($direc); $i++){
            if (strval($direc[$i]) == strval($dato6)) {
                $dato6 = intval($direc[$i-1]);
            }
        }
        $dato7 = $p[6]; # contraseña
        $dato8 = $p[7]; # es_jefe
        $query = "INSERT INTO usuarios(rut,direcciones,nombre,edad,sexo,direccion,id,contraseña,es_jefe,carrito) VALUES('$dato2','','$dato3',$dato5,'$dato4',$dato6,$dato1,'$dato7',$dato8,'');";
=======
        $dato6 = 0;
        for($i=1; $i<count($direc); $i+=2){
            if ($direc[$i] == $p[5]) {
                $dato6 = $dato6 + $direc[$i-1];
            }
        }

        $dato7 = $p[6]; # contraseña
        $dato8 = $p[7]; # es_jefe
        #send_base_87("INSERT INTO usuarios VALUES($dato2,'',$dato3,$dato5,$dato4,$dato6,$dato1,$dato7,$dato8,'');");

        $query = "INSERT INTO usuarios(rut,direcciones,nombre,edad,sexo,direccion,id,contraseña,es_jefe,carrito) VALUES('$dato2','','$dato3',$dato5,'$dato4','$dato6',$dato1,'$dato7',$dato8,'');";
        echo $query;
>>>>>>> master
        $result = $db2 ->prepare($query);
        $result ->execute();
    }
?>
<<<<<<< HEAD
=======


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
        $query = "UPDATE comestibles SET cantidad=$dato WHERE id=$c[0];";
        $result = $db2 ->prepare($query);
        echo $dato;
        echo $query;
        $result ->execute();
    }

    #Se construye la consulta como un string
    $query = "SELECT id FROM no_comestibles;";

    #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
    $result = $db2->prepare($query);
    $result->execute();
    $Comida = $result->fetchAll();
    
    foreach ($Comida as $c) {
        $dato = intval(generateRandomNum()); # Contraseña
        $query = "UPDATE no_comestibles SET cantidad=$dato WHERE id=$c[0];";
        $result = $db2 ->prepare($query);
        echo $dato;
        echo $query;
        $result ->execute();
    }

?>
>>>>>>> master
