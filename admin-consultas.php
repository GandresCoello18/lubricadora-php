<?php 

$title = 'Consultas | Administracion';
include_once('componentes/header.php');
$cosulta_usuarios = consulta('usuario');
$cosulta_contact = consulta('contacto');
$cosulta_producto = consulta('producto');
$cosulta_ventas = consulta_ventas();

?>


<section class="container-fluid">
        <div class="row justify-content-center">

           <?php 
                include_once('componentes/nav.php');
            ?>
        </div>

        <?php 
            include_once('componentes/admin-opciones.php');
        ?>

        <div class="col-12 mt-3">
            
        <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Consulta de todo los Usuario
                    </button>
                </h2>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    
                    <table class="table table-dark">
                        <thead>
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Clave</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($cosulta_usuarios as $item){
                                    echo "
                                    <tr>
                                        <th>". $item['id_user'] ."</th>
                                        <td>". $item['correo'] ."</td>
                                        <td>". $item['clave'] ."</td>
                                    </tr>
                                    ";
                                }
                            ?>
                        </tbody>
                    </table>


                </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Consulta todos los Contactos
                    </button>
                </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                    
                    <table class="table table-dark">
                        <thead>
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Asunto</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($cosulta_contact as $item){
                                    echo "
                                    <tr>
                                        <th>". $item['id_contact'] ."</th>
                                        <td>". $item['correo'] ."</td>
                                        <td>". $item['nombre'] ."</td>
                                        <td>". $item['asunto'] ."</td>
                                    </tr>
                                    ";
                                }
                            ?>
                        </tbody>
                    </table>

                </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Consulta de todo los productos
                    </button>
                </h2>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                    
                    <table class="table table-dark">
                        <thead>
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">titulo</th>
                            <th scope="col">descripcion</th>
                            <th scope="col">precio</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($cosulta_producto as $item){
                                    echo "
                                    <tr>
                                        <th>". $item['id_producto'] ."</th>
                                        <td>". $item['imagen'] ."</td>
                                        <td>". $item['titulo'] ."</td>
                                        <td>". $item['descripcion'] ."</td>
                                        <td>$". $item['precio'] ."</td>
                                    </tr>
                                    ";
                                }
                            ?>
                        </tbody>
                    </table>

                </div>
                </div>
            </div>
            </div>

            
            <div class="card">
                <div class="card-header" id="headingFOR">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFOR" aria-expanded="false" aria-controls="collapseFOR">
                        Consulta todas las ventas
                    </button>
                </h2>
                </div>
                <div id="collapseFOR" class="collapse" aria-labelledby="headingFOR" data-parent="#accordionExample">
                <div class="card-body">
                    
                    <table class="table table-dark">
                        <thead>
                            <tr>
                            <th scope="col">Correo</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($cosulta_ventas as $item){
                                    echo "
                                    <tr>
                                        <th>". $item['correo'] ."</th>
                                        <td>". $item['titulo'] ."</td>
                                        <td>$". $item['precio'] ."</td>
                                        <td>". $item['fecha'] ."</td>
                                    </tr>
                                    ";
                                }
                            ?>
                        </tbody>
                    </table>

                </div>
                </div>
            </div>
            </div>


        </div>
    </section>    


<?php
    require('componentes/footer.php');
?>