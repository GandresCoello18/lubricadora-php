<?php

    function ingresar_servicio($tipo, $nombre){
        global $con;
        $con->query("INSERT INTO servicio ( tipo_servicio, nombre_servcio ) VALUES ( '$tipo', '$nombre' )");
    }