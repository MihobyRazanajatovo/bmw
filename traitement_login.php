<?php
include('function.php');
session_start();
$idAdmin = $_POST['idAdmin'];
$email = $_POST['email'];
$mot_de_passe = $_POST['mot_de_passe'];

login($email, $mot_de_passe);
?>