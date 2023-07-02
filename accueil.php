<?php
    include('function.php');
    $v=getVetement();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="style2.css">
    <title>clients</title>
</head>
<body>
    <form action="traitement_ajout.php" method="post">
        <div class="date">
                <p>Date</p>
                <input type="date" name="dateCommande" id="dateCommande">
                <input type="time" name="timeCommande" id="timeCommande">
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
        <?php for ($i = 0; $i < count($v); $i++) { ?>
                    
                        <tr class="table2">
                            <td><?php echo $v[$i]['nomVetement'] ?></td>
                            <input type="hidden" name="idVetement[]" value="<?php echo $v[$i]['idVetement'] ?>">
                            <td class="datavl"><?php echo $v[$i]['PrixUnitaire'] ?></td>
                            <td><input class="quantite" type="number" name="quantite[]" id="quantite"></td>
                            <td class="sous_total"></td>
                            <td></td>

                        </tr>
                    
                    <?php } ?>
                </table>
                <p>TOTAL:  <span id="total"></span></p>
            
                <p><input type="submit" value="ADD" name="add"></p>
                
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