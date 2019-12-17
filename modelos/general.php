<?php
    include('dataBase/db.php');

    $con = connectDatabase();

    function recorrer($query){
        $rows = [];
        while($row = $query->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    function consulta($tabla){
        global $con;
        $query = $con->query("SELECT * FROM $tabla");
        return recorrer($query);
    }

    function abtraerID($retornar, $tabla, $campo, $valor){
        global $con;
        $query = $con->query("SELECT $retornar FROM $tabla WHERE $campo = $valor" );
        return recorrer($query);
    }

    function borrar($tabla, $campo, $valor){
        global $con;
        $con->query("DELETE FROM $tabla WHERE $campo = $valor");
    }

    function editar($tabla, $campo, $valor, $campoID, $valorID){
        global $con;
        $con->query("UPDATE $tabla SET $campo = $valor WHERE $campoID = $valorID");
    }