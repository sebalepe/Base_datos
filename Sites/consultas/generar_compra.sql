CREATE OR REPLACE FUNCTION

generar_compra (id int, id_comprador int, id_tienda int, id_producto int,
    cantidad_producto int, tipo int, cantidad_tabla int)

RETURNS void AS $$

BEGIN

INSERT INTO test(cantidad) VALUES (126);

IF tipo=0 THEN
        IF cantidad_producto = cantidad_tabla THEN
            DELETE FROM comestibles WHERE comestibles.id = id_producto;
        ELSE
            UPDATE comestibles SET comestibles.cantidad = comestibles.cantidad - cantidad_producto
            WHERE comestibles.id = id_producto;
        END IF;
END IF;
IF tipo=1 THEN
        IF cantidad_producto = cantidad_tabla THEN
            DELETE FROM no_comestibles WHERE no_comestibles.id = id_producto;
        ELSE
            UPDATE no_comestibles SET no_comestibles.cantidad = no_comestibles.cantidad - cantidad_producto
            WHERE no_comestibles.id = id_producto;
        END IF;
END IF;
INSERT INTO compras(id, id_producto, cantidad_producto, tienda, id_comprador)
VALUES (id, id_producto, cantidad_producto, id_tienda, id_comprador);

END;

$$ language plpgsql;
