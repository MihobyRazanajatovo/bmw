<?php
    include('function.php');
    $v=getVetement();    
?>


<script src="assets/js/chart.js"></script>                        
                                
<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5>Statistique de vente par type de vetements</h5>
        </div>
        <div class="card-block">
            <div class="row">
                <canvas id="bar-chart-hahahaha" width="400" height="250"></canvas>
                <script>
                        var xValues = [];
                        var yValues = [];
                
                        <?php for ($i = 0; $i < count($v); $i++) { ?>
                            xValues.push("<?php echo $v[$i]['nomVetement'] ?>");
                            yValues.push(<?php echo getNombreCommandeParVetement($v[$i]['idVetement']) ?>);
                            
                            <?php } ?>
                    new Chart(document.getElementById("bar-chart-hahahaha"), {
                        type: 'bar',
                        data: {
                        labels: xValues,
                        datasets: [
                            {
                            label: "nombre",
                            backgroundColor: "#32478f",
                            data: yValues
                            }
                        ]
                        },
                        options: {
                        title: {
                            display: true,
                            text: 'Nombre de ventes par vetements'
                        }
                        }
                    });
                </script>
            </div>
        </div>
    </div>
</div>