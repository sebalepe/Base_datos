CREATE OR REPLACE FUNCTION

generar_compra (id_compra int, id_comprador int, id_tienda int, id_producto int,
    cantidad_producto int, tipo int, cantidad_tabla int)

RETURNS void AS $$
DECLARE
    cant1 INT;
BEGIN
cant1 = cantidad_tabla - cantidad_producto;
INSERT INTO test(cantidad) VALUES (127);

IF tipo=0 THEN
        IF cantidad_producto = cantidad_tabla THEN
            UPDATE comestibles SET cantidad = 0
            WHERE id = id_producto;
      ELSE
            UPDATE comestibles SET cantidad = cant1
            WHERE id = id_producto;
        END IF;
END IF;
IF tipo=1 THEN
        IF cantidad_producto = cantidad_tabla THEN
            UPDATE no_comestibles SET cantidad = 0
            WHERE id = id_producto;
        ELSE
            UPDATE no_comestibles SET cantidad = cant1
            WHERE id = id_producto;
        END IF;
END IF;
INSERT INTO compras(id, id_producto, cantidad_producto, tienda, id_comprador)
VALUES (id_compra, id_producto, cantidad_producto, id_tienda, id_comprador);

END;

$$ language plpgsql;
