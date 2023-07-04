<?php
    include('function.php');
    $f = $_GET['id'];
    $vue = getView($f);
    $total =  getTotalFacture($f);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/facture.css">
    <title>Facture</title>
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
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="list_facture.php" role="button" aria-haspopup="true" aria-expanded="false">Liste des facture</a>
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
    <p class="soustitre3">Votre facture</p>
    <div class="facture" style="height: 560px;">
        <img src="assets/img/LOGO.png" alt="" style="width: 78px;">
        <h3>FACTURE</h3>
        <p>Client: <?php echo $vue[0]['client_nom'] ?></p>
        <p>Date: <?php echo $vue[0]['dateCommande'] ?></p>
        <p>Heure: <?php echo $vue[0]['timeCommande'] ?></p>
        <table>
            <tr>
                <th>Designation</th>
                <th>P.U</th>
                <th>Quantite</th>
                <th>Sous Total</th>
            </tr>
            <?php for ($i = 0; $i < count($vue); $i++) { ?>
            <tr>
                <td><?php echo $vue[$i]['nomVetement'] ?></td>
                <td><?php echo $vue[$i]['PrixUnitaire'] ?></td>
                <td><?php echo $vue[$i]['quantite'] ?></td>
                <td><?php echo $vue[$i]['sous_total'] ?></td>
            </tr>
            <?php } ?>
        </table>
        <p>Total : <?php echo $total[0]['total'] ?> </p>
        <p>THANK YOU</p>
        <form action="export_pdf.php" method="post">
            <input type="submit" value="VALIDER" style="margin-top: 10px;background-color: #252850;color: white;border: none;padding: 7px 20px;border-radius: 7px;margin-left: 387px;" >
        </form>
    </div>
</body>
</html>