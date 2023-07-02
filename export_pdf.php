<?php
    require('fpdf16/fpdf.php');
    $connexion = mysqli_connect('localhost', 'root', 'root', 'wb');
    if (!$connexion) 
    {
        die('Erreur de connexion à la base de données : ' . mysqli_connect_error());
    }
    $query = "SELECT * FROM facture ";
    $result = mysqli_query($connexion, $query);



?>