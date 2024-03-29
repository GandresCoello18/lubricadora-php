<?php 

$title = 'Admin | Registrar producto';
include_once('componentes/header.php');

    if(isset($_POST['guardar_product'])){
        $dato_producto = [$_POST['titutlo'], $_POST['precio'], $_POST['descripcion'] ];

        $status = true;
        for($i = 0; $i < count($dato_producto); $i++){
            if($dato_producto[$i] == null || $dato_producto[$i] == ''){
                $status = false;
                break;
            }else{
                $dato_producto[$i] = htmlspecialchars($dato_producto[$i]);
            }
        }

        if($status == true){

        $destino = 'img/productos/';
        $nombre = $_FILES['imagen']['name'];
        $tmp = $_FILES['imagen']['tmp_name'];
        move_uploaded_file($tmp, $destino . $nombre);

            ingresar_producto($nombre, $dato_producto[0], $dato_producto[2], $dato_producto[1] );
        }else{
            echo "<script>alert('Campos vacios, vuelva a intentarlo')</script>";
        }
    }

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

            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nombre del producto</label>
                    <input type="text" name="titutlo" class="form-control" id="exampleFormControlInput1" placeholder="Titulo del producto">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Seleccionar imagen</label>
                    <input type="file" name="imagen" class="form-control-file" id="exampleFormControlFile1">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect2">Precio</label>
                    <input class="form-control" name="precio" type="number" placeholder="0.00"/>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Descripcion</label>
                    <textarea class="form-control" name="descripcion" placeholder="Escribe un comentario del producto" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>

                <input type="submit" class="form-control btn btn-danger mb-3" name="guardar_product" value="Guardar" />
            </form>

        </div>
    </section>    


<?php
    require('componentes/footer.php');
?>