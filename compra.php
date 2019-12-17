<?php 
    $title = 'Comprar - Producto';
    include_once('componentes/header.php'); 

    if(isset($_POST['compro_producto'])){
        if(empty($_SESSION['cuenta_personal'])){
            echo "<script>alert('Debes de iniciar session para realizar la compra.')</script>";
        }else{
            ingresar_venta($_SESSION['cuenta_personal'], $_GET['producto']);
            echo "<script>alert('Su compra fue con exito.')</script>";
        }
    }
?>

<?php
    if(empty($_GET['producto'])){
        header('location: producto.php');
    }
    $ID = $_GET['producto'];
    $dato_item = producto_unico($ID);
    $recomendado_item = producto_recomendado();
?>

    <section class="container-fluid">
        <div class="row justify-content-center">

           <?php 
                include_once('componentes/nav.php');
            ?>

            <div class="col-12 col-md-6 mt-3">
                <?php  
                    foreach($dato_item as $item){
                        echo "
                            <div class='card mb-3' style='max-width: 540px;'>
                                <div class='row no-gutters'>
                                    <div class='col-md-4'>
                                        <img src='img/productos/". $item['imagen'] ."' class='card-img' alt='...'>
                                    </div>
                                    <div class='col-md-8'>
                                        <div class='card-body'>
                                            <h5 class='card-title'>". $item['titulo'] ."</h5>
                                            <p class='card-text'>". $item['descripcion'] .".</p>
                                            <p class='card-text'><small class='text-muted'>Precio: ". $item['precio'] ."</small></p>
                                            <form method='POST'>
                                                <button type='submit' name='compro_producto' class='btn btn-success form-control'>Comprar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        ";
                    }
                ?>
            </div>
            <div class="col-12 col-md-6 mt-3">
                <h5 class="text-center">Recomendado</h5>
                <div class="row">

                    <?php
                        foreach($recomendado_item as $item){
                            echo "
                                <div class='col-12 col-lg-6 mb-'>
                                    <div class='card' style='width: 16rem;'>
                                        <img class='card-img-top' src='img/productos/". $item['imagen'] ."' alt='Card image cap'>
                                        <div class='card-body'>
                                            <h5 class='card-title'>".$item['titulo']."</h5>
                                            <p class='card-text'>". $item['descripcion'] .".</p>
                                            <a href='compra.php?producto=". $item['id_producto'] ."' class='btn btn-primary form-control'>Comprar Producto -- <b>". $item['precio'] ."</b> </a>
                                        </div>
                                    </div>
                                </div>
                            ";
                        }
                    ?>
                
                </div>
            </div>
        </div>
    </section>        

    <?php require('componentes/footer.php'); ?>
