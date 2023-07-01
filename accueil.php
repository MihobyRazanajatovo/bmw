<?php
    include('function.php');
    $v=getVetement();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>clients</title>
</head>
<body>
    <?php for ($i = 0; $i < count($v); $i++) { ?>
                
                    <tr class="table2">
                        <td><?php echo $v[$i]['nomVetement'] ?></td>
                        <td class="datavl"><?php echo $v[$i]['PrixUnitaire'] ?></td>
                        <td><input class="quantite" type="number" name="quantite[]" id="quantite"></td>
                        <td class="sous_total"></td>
                        <td></td>

                    </tr>
                
                <?php } ?>
            </table>
            <p>TOTAL:  <span id="total"></span></p>
          
            <p><input type="submit" value="ADD" name="add"></p>
            </from>
        </div>
        <div class="facture">
            <img src="assets/img/LOGO.png" alt="">
            <h3>FACTURE</h3>
            <table>
                <tr>
                    <th>Designation</th>
                    <th>P.U</th>
                    <th>Quantite</th>
                    <th>TOTAL</th>
                </tr>
                <tr>
                    <td>test</td>
                    <td>test</td>
                    <td>test</td>
                    <td>test</td>
                </tr>
            </table>
            <p>THANK YOU</p>
        </div>
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