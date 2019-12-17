
<?php 
    $title = 'Productos';
    include_once('componentes/header.php'); 

    $dato = consulta_productos();
?>
    
    <section class="container-fluid">
        <div class="row justify-content-center">

           <?php 
                include_once('componentes/nav.php');
            ?>

            <?php
                foreach($dato as $item){
                    echo "
                    <div class='col-10 col-sm-6 col-md-4 col-lg-3 mb-2 mt-4'>
                        <div class='card' style='width: 16rem;'>
                            <img class='card-img-top' src='img/productos/".$item['imagen'] ."' alt='Card image cap'>
                            <div class='card-body'>
                                <h5 class='card-title'>". $item['titulo'] ."</h5>
                                <p class='card-text'>". $item['descripcion'] .".</p>
                                <a href='/compra.php?producto=". $item['id_producto'] ."' class='btn btn-primary form-control'>Comprar &nbsp; &nbsp; <strong>$ ". $item['precio'] ."</strong> </a>
                            </div>
                        </div>
                    </div>";
                }
            ?>

        </div>
    </section>

    <?php include_once('componentes/footer.php'); ?>