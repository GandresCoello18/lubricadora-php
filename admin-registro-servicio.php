<?php 

$title = 'Admin | Registrar Servicio';
include_once('componentes/header.php');

$consulta_user = consulta('usuario');

    if(isset($_POST['guardar_servicio'])){
        $dato_servicio = [ $_POST['tipo_servicio'], $_POST['nombre_servicio'] ];

        $status = true;
        for($i = 0; $i < count($dato_servicio); $i++){
            if($dato_servicio[$i] == null || $dato_servicio[$i] == ''){
                $status = false;
                break;
            }else{
                $dato_servicio[$i] = htmlspecialchars($dato_servicio[$i]);
            }
        }

        if($status == true){
            ingresar_servicio($dato_servicio[0], $dato_servicio[1]);
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

        <div class="col-12 col-md-6 mt-3">
        
            <form method="POST">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Tipo de servicio</label>
                    <select name="tipo_servicio" class="form-control">
                        <option>Cambio de aceite</option>
                        <option>Lavado y encerado de vehiculo</option>
                        <option>Limpieza especial interna del vehiculo</option>
                        <option>Pulbarizacion del motor</option>
                        <option></option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect2">A nombre</label>
                    <select name="nombre_servicio" class="form-control">
                        <?php 
                            foreach($consulta_user as $item){
                                echo "
                                    <option>". $item['correo'] ."</option>            
                                ";
                            }
                        ?>
                        <option>Consumidor Final</option>
                    </select>
                </div>

                <input type="submit" class="form-control btn btn-danger mb-3" name="guardar_servicio" value="Guardar Servicio" />
            </form>

        </div>
    </section>    