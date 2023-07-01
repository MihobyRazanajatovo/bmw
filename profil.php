<?php
    include('function.php');
    session_start();

    if (isset($_SESSION['prenomAdmin'])) {
        $prenomAdmin = $_SESSION['prenomAdmin'];
    } else {
        header("Location: index.php");
        exit();
    }
    
    $tab=array();
    if(isset($_GET['add']))
    {
        AddCommande($_GET['idClient'],$_GET['idVetement'],$_GET['quantite'],$_GET['dateCommande'],$_GET['timeCommande'],$_GET['timeCommande']);
    }
    // $somme=sum('commande', 'totalCommande');


    $sous_total=sousTotal();
?>

<!DOCTYPE html>
<html lang="en" style="margin-top: 136px;">   
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commandes</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="style2.css">

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
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 active">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Home</a>
                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link" href="#">Customers</a>
                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link" href="#">Commands</a>
                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link" href="#"><img src="assets/img/logout.png" alt="" style="height: 32px;margin-top: -8px;"></a>
                                </li>
                            </ul>
                        </div>    
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- content -->
    </header>
    <div class="container">
        <h2 class="titre">Bienvenue <?php echo $prenomAdmin; ?></h2>
        <p class="soustitre">Entrez ici les commande</p>
        <form method="POST" action="traitement_ajout.php">
        <div class="date">
            <p>Date</p>
            <input type="date" name="dateCommande" id="dateCommande">
            <input type="time" name="timeCommande" id="timeCommande">
        </div>
        <div class="client">
            <p>Coordonnees des clients</p>
            <input type="text" name="nom" id="nom" placeholder="Name">
            <input type="email" name="email" id="email" placeholder="Email">
            <input type="number" name="telephone" id="telephone" placeholder="Phone">
        </div>
        <div class="box">
            
            <table class="table">
                <tr>
                    <th>Type de vetement</th>
                    <th>Prix unitaire</th>
                    <th>Quantity</th>
                    <th>Sous-total</th>
                    <th>Annuler</th>
                </tr>
                

</body>
</html>