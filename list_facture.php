<?php
    include('function.php');
    $lf = getAllFacture();
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
    <link rel="stylesheet" href="assets/css/dt.css">
    <title>Listes des factures</title>
</head>
<body>
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
                                    <a class="nav-link" href="profil.php">Home</a>
                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 active">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Liste des factures</a>
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
    <div class="container">
        <?php for ($i = 0; $i < count($lf); $i++) { ?>
        <div class="list">
            <p class="soustitre4">FACTURE DE</p>
            
                <p><?php echo $lf[$i]['nom'] ?></p>
                <p><?php echo $lf[$i]['email'] ?></p>
                <p><?php echo $lf[$i]['telephone'] ?></p>
                <button type="submit"><a href="details_facture.php?id=<?php echo $lf[$i]['idFacture']; ?>">Voir les details </a></button>
            
        </div>
        <?php } ?> 
    </div>
</body>
</html>