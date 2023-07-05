<?php
    include('function.php');
    $v=getVetement();
    session_start();
    $prenomAdmin = $_SESSION['prenomAdmin'];
    $mysqli = mysqli_connect('localhost', 'root', 'root', 'wb');
    if (!$mysqli) {

    }
    mysqli_set_charset($mysqli, "utf8");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/commande.css">
    <title>Commande</title>
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
                                    <a class="nav-link" href="list_facture.php">Accueil</a>
                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link" href="list_facture.php">Liste des factures</a>
                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link" href="dashboard.php">Statistiques</a>
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
    <div class="back">
        <p class="soustitre">Insérez ici la date d'aujourd'hui</p>
        <form action="traitement_ajout.php" method="post">
            <div class="date">
                <p class="titreDate">Date</p>
                <p class="nextDate">
                    <input type="date" name="dateCommande" id="dateCommande" >
                    <input type="time" name="timeCommande" id="timeCommande" style="margin-left: 12px;">
                </p>              
            </div>
            <div class="box"> 
                <p class="soustitre2">Faîtes la commande ici</p>     
                <table class="table">
                    <tr>
                        <th>Type de vetement</th>
                        <th>Prix unitaire</th>
                        <th>Quantity</th>
                        <th>Sous-total</th>
                    </tr>
                    <?php for ($i = 0; $i < count($v); $i++) { ?>          
                    <tr class="table2">
                        <td><?php echo $v[$i]['nomVetement'] ?></td>
                        <input type="hidden" name="idVetement[]" value="<?php echo $v[$i]['idVetement'] ?>">
                        <td class="datavl"><?php echo $v[$i]['PrixUnitaire'] ?> Ar</td>
                        <td><input class="quantite" type="number" name="quantite[]" id="quantite"></td>
                        <td class="sous_total"></td>
                        <?php } ?>
                        
                    </tr>
                    <tr class="total">
                        <td></td>
                        <td></td>
                        <th>TOTAL: </th>
                        <th><span id="total"></span> Ar</th>
                    </tr>               
                    
                     
                </table> 
                <p><input type="submit" value="Confirmer" name="add" class="confirmBouton"></p>      
            </div>
        </from>   
    </div>
  <script>
  var inputs = document.querySelectorAll(".quantite");
  var datavl = document.querySelectorAll(".datavl");
  var resultat = document.querySelectorAll(".sous_total");
  var send = document.querySelectorAll(".send");
  var total = 0;

  for (let i = 0; i < inputs.length; i++) {
    inputs[i].addEventListener('input', function() {
      // Obtenir la valeur actuelle de l'élément
      let currentValue = parseInt(inputs[i].value);
      let prix = parseInt(datavl[i].innerHTML)
      var result = currentValue * prix;
      total += result;
      console.log(total);
      // Mettre à jour le champ de saisie avec la nouvelle valeur
      resultat[i].innerHTML = result;
      send.href = "traitement_ajout.php?soustotal=" + result;

      // Update the total value
      updateTotal();
    });
  }

  function updateTotal() {
    var totalElement = document.getElementById('total');
    totalElement.textContent = total;
  }
</script>
</body>
</html>