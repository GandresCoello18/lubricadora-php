<?php

    function confirmar($correo){
        global $con;
        $query = $con->query("SELECT * FROM usuario WHERE correo = '$correo' ");
        if($query == false){
            return [];
        }
        return recorrer($query);
    }

    function obtener_correo_user($ID){
        global $con;
        $query = $con->query("SELECT correo FROM usuario WHERE id_user = $ID ");
        return recorrer($query);
    }

    function registro_user($correo, $clave, $tipo, $codigo){
        if($codigo == null || $codigo == ''){
            $codigo = 'Nulo';
        }else if($codigo != '0852'){
            echo "<script>alert('El codigo es incorrecto')</script>";
            return false;
        }
        global $con;
        $con->query("INSERT INTO usuario (correo, clave, tipo, codigo) VALUES ('$correo', '$clave', '$tipo', '$codigo')");
    }