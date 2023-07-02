<?php
    include('function.php');
    $f = getDernierFacture(); 
    $vue = getView($f);
    $total = getTotalFacture($f);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture</title>
</head>
<body>
    
    <div class="facture">
            <img src="assets/img/LOGO.png" alt="">
            <h3>FACTURE</h3>
            <p><?php $vue[0]['client_nom'] ?></p>
            <p><?php $vue[0]['dateCommande'] ?></p>
            <p><?php $vue[0]['timeCommande'] ?></p>
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
            <p>Total : <?php $total[0]['total'] ?> </p>
            <p>THANK YOU</p>
        </div>
</body>
</html>