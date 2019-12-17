<?php

    function verificar_admin($ID){
        global $con;
        $query = $con->query("SELECT tipo FROM usuario WHERE id_user = $ID");
        return recorrer($query);
    }