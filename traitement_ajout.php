<?php

session_start();

// include('function.php');

// $ajouter=$_GET['idCommande'];

// if(!isset($_SESSION['newtable'])){
//     $_SESSION['newtable']=array();
// }

// $table=$_SESSION['newtable'];
// $table[]=$ajouter;

// $_SESSION['newtable']=$table;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $quantities = $_POST['quantite'];

  // Loop through the submitted quantities
  foreach ($quantities as $quantity) {
    // Do something with each quantity value

  }
}

?>