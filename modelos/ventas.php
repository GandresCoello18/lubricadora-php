<?php

    function ingresar_venta($ID_USER, $ID_PRODUCTO){
        global $con;
        $con->query("INSERT INTO ventas ( id_user, id_prodcuto, fecha ) VALUES ($ID_USER, $ID_PRODUCTO, NOW());");
    }

    function reporte_ventas_mes(){
        global $con;
        $query = $con->query("SELECT COUNT(*), ventas.fecha FROM ventas INNER JOIN usuario ON usuario.id_user = ventas.id_user INNER JOIN producto ON producto.id_producto = ventas.id_prodcuto GROUP BY ventas.fecha ");
        return recorrer($query);
    }

    function consulta_ventas(){
        global $con;
        $query = $con->query("SELECT usuario.correo, producto.titulo, producto.precio, ventas.fecha FROM ventas INNER JOIN usuario ON ventas.id_user = usuario.id_user INNER JOIN producto ON producto.id_producto = ventas.id_prodcuto;");
        return recorrer($query);
    }