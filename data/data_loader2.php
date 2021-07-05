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

    require ("../Sites/config/conexion.php");

    #Se construye la consulta como un string
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
        $dato6 = $p[5]; # direccion
        for ($i; $i < count($direc); $i++){
            if (strval($direc[$i]) == strval($dato6)) {
                $dato6 = intval($direc[$i-1]);
            }
        }
        $dato7 = $p[6]; # contraseña
        $dato8 = $p[7]; # es_jefe
        $query = "INSERT INTO usuarios(rut,direcciones,nombre,edad,sexo,direccion,id,contraseña,es_jefe,carrito) VALUES('$dato2','','$dato3',$dato5,'$dato4',$dato6,$dato1,'$dato7',$dato8,'');";
        echo $query;
        $result = $db2 ->prepare($query);
        $result ->execute();
    }
?>
