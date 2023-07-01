<?php
  include('function.php');
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/Style.css">
    <title>login admin</title>
</head>
<body>
  <div class="container">
    <div class="login-container">
      <p><img src="assets/img/LOGO.png" alt="Logo" class="logo"> </p>
      <h2 class="title">Welcome back,</h2>
      <form action="traitement_login.php" method="post" class="login-form" >
        <input type="email" name="email" class="email" placeholder="Email" required>
        <input type="password" name="mot_de_passe" class="mot_de_passe" placeholder="Password" required>
        <button type="submit" style="margin-top: 25px;">LOG IN</button>
      </form>
    </div>
  </div>  
</body>
</html>

