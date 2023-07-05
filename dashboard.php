<?php
    include('function.php');
    $v=getVetement();  

    session_start();
    $prenomAdmin = $_SESSION['prenomAdmin'];  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/stat.css">
    <title>Statistiques</title>
</head>
<body>
    <header>
    <div class="navigation-wrap bg-light start-header start-style">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-md navbar-light">
                    
                        <a class="navbar-brand" target="_blank"><img src="assets/img/LOGO.png" alt=""></a>	
                        
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto py-4 py-md-0">
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link" href="profil.php">Accueil</a>
                                </li>
                                
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link" href="list_facture.php">Liste des factures</a>
                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 active">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Statistiques</a>
                                </li>
                                
                                <?php if(isset($prenomAdmin)) { ?>
                                    <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                        <a href="Deconnexion.php"><img src="assets/img/logout.png" alt="" style="height: 32px;margin-top: -8px;"></a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>    
                    </nav>
                </div>
            </div>
        </div>
    </div>
    </header>
    <div class="stat">
    <script src="assets/js/chart.js"></script>                        
                        
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 style="font-family: 'Libre-Baskerville';color: #32478F;">Statistique de vente par type de vetements</h5>
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
    </div> 
</body>
</html>


