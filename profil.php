<?php
    include('function.php');
    session_start();

    if (isset($_SESSION['prenomAdmin'])) {
        $prenomAdmin = $_SESSION['prenomAdmin'];
    } else {
        header("Location: index.php");
        exit();
    }
    
?>

<!DOCTYPE html>
<html lang="en" style="margin-top: 136px;">   
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commandes</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/client.css">

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
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Accueil</a>
                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link" href="list_facture.php">Liste des factures</a>
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
    <!-- content -->
    </header>
    <div class="container">
        <h2 class="titre" style="margin-right: 8px;">Bienvenue <?php echo $prenomAdmin; ?></h2>
        <form method="post" action="traitement_ajoutClient.php">
            <div class="client">
                <p class="p">Insérez ici les coordonnées du client</p>
                <input type="text" name="nom" id="nom" placeholder="Name">
                <input type="email" name="email" id="email" placeholder="Email">
                <input type="number" name="telephone" id="telephone" placeholder="Phone">
                <input type="submit" value="Ajouter" name="add" class="boutonAdd">
            </div>
        </form>
    </div>
</body>
</html>