
<?php 

    $title = 'Principal';
    include_once('componentes/header.php'); 

    if(isset($_POST['contact_enviar'])){
        $datos_contact = [$_POST['contact_correo'], $_POST['contact_nombre'], $_POST['contact_comentario'] ];
        $status = true;

        for($i=0; $i<count($datos_contact); $i++){
            if($datos_contact[$i] == null || $datos_contact[$i] == ''){
                $status = false;
                break;
            }else{
                $datos_contact[$i] = htmlspecialchars($datos_contact[$i]);
            }
        }

        if($status == true){
            ingresar_contact($datos_contact[0], $datos_contact[1], $datos_contact[2]);
        }else{
            echo "<script>alert('Campos vacios, vuelve a intentarlo')</script>";
        }        

    }
?>
    
    <section class="container-fluid">
        <div class="row justify-content-center">

           <?php 
                include_once('componentes/nav.php');
                include_once('componentes/portada.php'); 
            ?>
            
           
            <div class="col-12 mt-4">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8">
                        <h4 class="text-center">Ubicacion</h4>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m21!1m12!1m3!1d127468.70474764849!2d-80.04517570945342!3d-3.2511028760539253!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m6!3e6!4m0!4m3!3m2!1d-3.2511053!2d-79.9751351!5e0!3m2!1ses-419!2sec!4v1576310467643!5m2!1ses-419!2sec" style="width: 100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                    </div>
                    <div class="col-12 col-md-3">
                        <h4 class="text-center">Hora Laborales</h4>

                        <button class="btn btn-success form-control" id="horas_laborables">Abierto</button>

                        <ul class="list-group mt-3">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                7:30 am - 6:00 pm
                                <span class="badge badge-primary badge-pill">Lunes</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                7:30 am - 6:00 pm
                                <span class="badge badge-primary badge-pill">Martes</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                7:30 am - 6:00 pm
                                <span class="badge badge-primary badge-pill">Miercoles</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                7:30 am - 6:00 pm
                                <span class="badge badge-primary badge-pill">Jueves</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                7:30 am - 6:00 pm
                                <span class="badge badge-primary badge-pill">Viernes</span>
                            </li>
                            
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                7:30 am - 6:00 pm
                                <span class="badge badge-primary badge-pill">sabado</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-3 p-4" style="background-color: rgb(245, 245, 245);">
                <h2 class="text-center">Descripcion</h2>
                <p class="p-2">Venta al por menor de lubricantes y de accesorios, partes y piezas de vehículos automotores. Tipos de Aceites de motor de toda numeración:</p>

                <p class="p-2">También ¡Ofrecemos nuestro Servicio a Domicilio!.<br/>
                    Tenemos Lubricantes para todo tipo de vehículos y maquinarias pesadas.<br/>
                    Accesorios, filtros para todo tipo de carros (aire, gasolina), aditivos, gres, bujías, plumas, limpia vídrio, brillo para tableros y perfumes vehiculares.
                </p>
            </div>
            <div class="col-8 mt-3">
                <form method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Correo electronico:</label>
                        <input type="email" name="contact_correo" class="form-control" require id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese su correo.">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nombres</label>
                        <input type="text" name="contact_nombre" class="form-control" require id="exampleInputPassword1" placeholder="ingrese sus nombres">
                    </div>
                    <div class="form-group">          
                        <label class="form-check-label" for="exampleCheck1">Asunto</label>
                        <textarea class="form-control" name="contact_comentario" placeholder="escribenos un comentaio..." require></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" name="contact_enviar">Enviar</button>
                </form>
            </div>
        </div>
    </section>

    <script>
        function horas_laborables(){
            let horas = document.getElementById('horas_laborables');
            if(new Date().getHours() > 17){
                horas.innerHTML = 'Cerrado';
                horas.classList.add('btn-danger');
                horas.classList.remove('btn-success');
            }
        }

        horas_laborables();
    </script>

    <?php include_once('componentes/footer.php'); ?>