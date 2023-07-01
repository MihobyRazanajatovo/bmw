<?php

session_start();

include('function.php');

// $ajouter=$_GET['idCommande'];

// if(!isset($_SESSION['newtable'])){
//     $_SESSION['newtable']=array();
// }

// $table=$_SESSION['newtable'];
// $table[]=$ajouter;

// $_SESSION['newtable']=$table;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $quantities = $_POST['quantite'];
  $idVetements = $_POST['idVetement'];
  // Loop through the submitted quantities
   for ($i = 0; $i < count($idVetements); $i++) {
    echo $quantities[$i];
    AddCommande($idVetements[$i],$quantities[$i],$_POST['dateCommande'],$_POST['timeCommande']); 
    // Do something with the quantity value
  }
}

?>