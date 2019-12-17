<div class="col-12 mt-3">
    <div class="row justify-content-around">
        
        <div onclick="item_1_menu()" class="col-12 col-md-3 bg-info mb-3 rounded p-2 text-center text-white" id="item_uno" style="cursor: pointer">
            <b>Consultas</b>
        </div>

        <div onclick="item_2_menu()" class="col-12 col-md-3 bg-info mb-3 rounded p-2 text-center text-white" id="item_dos" style="cursor: pointer">
            <b>Registrar Servicio</b>
        </div>

        <div onclick="item_3_menu()" class="col-12 col-md-3 bg-info mb-3 rounded p-2 text-center text-white" id="item_tres" style="cursor: pointer">
            <b>Ingresar Producto</b>
        </div>

    </div>
</div>

<script>

    document.addEventListener("DOMContentLoaded", inicio);
    function inicio(){
        if(window.location.pathname == '/admin-consultas.php'){
            cambia_color('item_uno');
        }else if(window.location.pathname == '/admin-registro-servicio.php'){
            cambia_color('item_dos');
        }else if(window.location.pathname == '/admin-ingresar-producto.php'){
            cambia_color('item_tres');
        }
    }

    function cambia_color(opcion){
        document.getElementById(opcion).classList.remove('bg-info');
        document.getElementById(opcion).classList.add('bg-success');
    }

    function item_1_menu(){
        window.location.href = '/admin-consultas.php';
    }

    function item_2_menu(){
        window.location.href = '/admin-registro-servicio.php';
    }

    function item_3_menu(){
        window.location.href = '/admin-ingresar-producto.php';
    }

</script>