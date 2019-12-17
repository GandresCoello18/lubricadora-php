<?php 

    if(!empty($_SESSION['cuenta_personal'])){
        ////////////
    }else{
        $_SESSION['cuenta_personal'] = null;
    }

    if(isset($_POST['guardar_registro'])){
        $datos = [$_POST['correo_registro'], $_POST['clave_registro'], $_POST['confirma_clv_registro'], $_POST['tipo'] ];
        $status = true;
        
        for($i = 0; $i < count($datos); $i++){
            if($datos[$i] == null || $datos[$i] == ''){
                $status = false;
                break;
            }else{
                $datos[$i] = htmlspecialchars($datos[$i]);
                $codigo = htmlspecialchars($_POST['codigo-admin']);
            }
        }
        
        if($status == false){
            echo "<script>alert('Campos vacios, vuelva a intentarlo')</script>";
        }else{
            if($datos[1] == $datos[2]){
                $c = confirmar($datos[0]);
                if($c == []){
                    $encriptacion = password_hash($datos[1], PASSWORD_DEFAULT);
                    registro_user($datos[0], $encriptacion, $datos[3], $codigo);
                }else{
                    echo "<script>alert('Esta cuenta ya existe, prueba con otra')</script>";    
                }
            }else{
                echo "<script>alert('Las contrasenas no son iguales')</script>";
            }
        }

    }

    if(isset($_POST['login_btn'])){
        $datos_login = [$_POST['user_login'], $_POST['clave_login']];

        $status = true;
        for($i = 0; $i < count($datos_login); $i++){
            if($datos_login[$i] == null || $datos_login[$i] == ''){
                $status = false;
                break;
            }else{
                $datos_login[$i] = htmlspecialchars($datos_login[$i]);
            }
        }

        if($status == true){
            $c = confirmar($datos_login[0]);
            $obtener_clave_db = $c[0]["clave"];
            if(password_verify($datos_login[1], $obtener_clave_db) > 0){
                $_SESSION['cuenta_personal'] = $c[0]["id_user"];
                if($c[0]["tipo"] == 'user'){
                    header('location: producto.php'); 
                }else{
                    header('location: administrador.php');
                }
            }else{
                echo "<script>alert('Datos incorrectos, vuelva a intentarlo')</script>";
                header('location: index.php');
            }
        }

    }
?>

<div class="col-12 ">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">
            <img src="img/logo.png" width="80" height="80" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/producto.php">Productos</a>
                </li>
                <?php 
                    if(!empty($_SESSION['cuenta_personal'])){  
                            foreach(obtener_correo_user($_SESSION['cuenta_personal']) as $item){
                                echo "
                                    <li class='nav-item'>
                                        <a class='nav-link' id='nav_user' href='#'>". $item['correo'] ."</a>
                                    </li>
                                    ";
                            }      
                    }else{
                        echo "
                            <li class='nav-item'>
                                <a class='nav-link' id='nav_user' href='#'>Anonimo</a>
                            </li>";
                    }               
                ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Opciones
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <?php 
                            if(!empty($_SESSION['cuenta_personal'])){
                                echo "<a class='dropdown-item' href='/cerrar_session.php' >Cerrar Session</a>";
                            }else{
                                echo "<a class='dropdown-item' href='#'  data-toggle='modal' data-target='#registroModal'>Registrate</a>";
                            }
                        ?>
                    </div>
                </li>
                <li class="nav-item">
                    <form class="form-inline" id="form_login" method="POST">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">@</span>
                            </div>
                            <input type="text" class="form-control" name="user_login" placeholder="Usuario" aria-label="Username" aria-describedby="basic-addon1">
                            <input type="password" class="form-control ml-1" name="clave_login" placeholder="contrasena" aria-label="Password" aria-describedby="basic-addon1">
                            <input type="submit" value="Entrar" name="login_btn" class="btn btn-success ml-1" />
                        </div>
                    </form>
                </li>
            </ul>
        </div>
    </nav>
</div>


<div class="modal fade" id="registroModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrate</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">Correo electronico:</label>
                <input type="email" name="correo_registro" class="form-control" require id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese su correo.">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Contrasena:</label>
                <input type="password" class="form-control" name="clave_registro" require id="exampleInputPassword1" placeholder="ingrese su contrasena">
            </div>
            <div class="form-group">          
                <label class="form-check-label" for="exampleCheck1">verificar:</label>
                <input type="password" class="form-control" name="confirma_clv_registro" require id="exampleInputPassword1" placeholder="vuelva a ingrese su contrasena">
            </div>
            <div class="form-group">
                <label for="tipo">Tipo:</label>
                <select name="tipo" id="tipo" class="form-control" onchange="tipo_registro()">
                    <option value="user">Usuario</option>
                    <option value="admin">Administracion</option>
                </select>
            </div>
            <div class="form-group codigo-admin">
                <label>Codigo:</label>
                <input type="number" name="codigo-admin" class="form-control" placeholder="ingrese el codigo para administradores" />
            </div>
            <button type="submit" class="btn btn-primary" name="guardar_registro">Guardar</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<script>
    function tipo_registro(){
        var selec = document.getElementById('tipo');
        var cod = document.querySelector('.codigo-admin');
        if(selec.value == 'admin'){
            cod.style.display = 'block';
        }else{
            cod.style.display = 'none';
        }
    }

    function bloquear_login(){
        let nav_name = document.getElementById('nav_user').innerText;
        if(nav_name != 'Anonimo'){
            for(var i=1; i<=3; i++){
                document.getElementById('form_login').children[0].children[i].disabled = true;
            }
        }
    }

    bloquear_login();
</script>