<?php

session_start();

include('function.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $quantities = $_POST['quantite'];
  $idVetements = $_POST['idVetement'];
  $idClient = getDernierClient();
  AddFacture($idClient);
  $idFacture = getDernierFacture();
  // Loop through the submitted quantities
   for ($i = 0; $i < count($idVetements); $i++) {
    echo $quantities[$i];
    AddCommande($idVetements[$i],$quantities[$i],$_POST['dateCommande'],$_POST['timeCommande']); 
    $idCommande = getDernierCommande();
    AddDetailsFacture($idCommande,$idFacture);
    // Do something with the quantity value
  }
}
header("Location: facture.php");

?>