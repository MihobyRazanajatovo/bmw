<?php
session_start();
include('function.php');

AddClient($_POST['nom'],$_POST['email'],$_POST['telephone']);

header("Location: accueil.php");

?>
