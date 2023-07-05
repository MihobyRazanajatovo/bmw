<?php
    include("function.php");

    $idCommande = $_GET['id'];

    delete($idCommande);
    header('location:accueil.php');
?>