CREATE OR REPLACE FUNCTION

generar_compra (id int, id_comprador int, id_tienda int, id_producto int, cantidad_producto int, tipo int)

RETURNS void AS $$

BEGIN

IF tipo=0 THEN
            DELETE FROM comestible WHERE comestibles.id = id_producto;
        END IF;
IF tipo=1 THEN
            DELETE FROM comestible WHERE no_comestibles.id = id_producto;
        END IF;

INSERT INTO compras VALUES (id, id_comprador, id_tienda, id_producto, cantidad_producto)

END

$$ language plpgsql
