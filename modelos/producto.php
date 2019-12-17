<?php

function consulta_productos(){
    global $con;
    $query = $con->query("SELECT * FROM producto ORDER BY id_producto DESC");
    return recorrer($query);
}

function producto_unico($ID){
    global $con;
    $query = $con->query("SELECT * FROM producto WHERE id_producto = $ID");
    return recorrer($query);
}

function producto_recomendado(){
    global $con;
    $query = $con->query("SELECT * FROM producto WHERE NOT id_producto = 2 LIMIT 3");
    return recorrer($query);
}

function ingresar_producto(){
    global $con;
    $con->query("INSERT INTO producto () VALUES () ");
}