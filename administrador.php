<?php 

$title = 'Administracion';
include_once('componentes/header.php');

if(!empty($_SESSION['cuenta_personal'])){
    $veri = verificar_admin($_SESSION['cuenta_personal']);
    if($veri[0]["tipo"] !== "admin"){
        header('location: index.php');
    }
}else{
    header('location: index.php');
}

function colocar_datos_diagrama_venta(){
    $dato_venta = reporte_ventas_mes();
    $reserva = "";
    foreach($dato_venta as $item){
        $concat = $item['COUNT(*)'];
        $reserva = $reserva."'$concat',";
    }
    return $reserva;
}

function colocar_label_diagrama_venta(){
    $dato_venta = reporte_ventas_mes();
    $reserva = "";
    foreach($dato_venta as $item){
        $concat = $item['fecha'];
        $reserva = $reserva."'$concat',";
    }
    return $reserva;
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
            <canvas id="diagrama_admin">  </canvas>
        </div>
    </section>    


<?php
    require('componentes/footer.php');


    echo "
        <script>
            var ctx = document.getElementById('diagrama_admin').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [". colocar_label_diagrama_venta() ."],
                    datasets: [{
                        label: 'Diagrama de ventas por mes',
                        data: [". colocar_datos_diagrama_venta() ."],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        </script>
    ";
?>   

