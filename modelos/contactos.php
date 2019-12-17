<?php

    function ingresar_contact($correo, $nombre, $asunto){
        global $con;
        $con->query("INSERT INTO contacto ( correo, nombre, asunto ) VALUES ( '$correo', '$nombre', '$asunto' ) ");
    }