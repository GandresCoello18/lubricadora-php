<?php 
    require('modelos/general.php');
    require('modelos/user.php');
    require('modelos/contactos.php');
    require('modelos/producto.php');
    require('modelos/ventas.php');
    require('modelos/admin.php');
    require('modelos/servicio.php');
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title; ?></title>        
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="path/to/chartjs/dist/Chart.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="css/index.css" />
    </head>
<body>