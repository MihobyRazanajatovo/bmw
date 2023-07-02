<?php
    function mysqlconnect()
    {
        $bdd = mysqli_connect('localhost','root','root','wb');
        return $bdd;
    }
//miasa
    function login($email, $mot_de_passe)
    {
        $conn = mysqlconnect();

        $email = $conn->real_escape_string($email);
        $mot_de_passe = $conn->real_escape_string($mot_de_passe);

        $sql = "SELECT * FROM administrateur WHERE email = '$email' AND mot_de_passe = '$mot_de_passe'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $prenomAdmin = $row['prenomAdmin'];

            $_SESSION['prenomAdmin'] = $prenomAdmin;

            header("Location: profil.php");
        } else {
            header("Location: index.php?error=1");
            exit();
        }
    }
    function AddClient($nom,$email,$telephone)
    {
        $connect=mysqlconnect();
        $count=mysqli_query($connect,"select MAX(idClient) from client");
        $result=mysqli_fetch_row($count);
        $id=$result[0]+1;
        $sql="insert into client values('".$id."','".$nom."','".$email."','".$telephone."')";
        $valiny=mysqli_query($connect,$sql);
    }
//miasa
    function AddCommande($idVetement,$quantite,$dateCommande,$timeCommande)
    {
        $connect=mysqlconnect();
        $count=mysqli_query($connect,"select MAX(idClient) from client");
        $count1=mysqli_query($connect,"select MAX(idCommande) from commande");
        $result=mysqli_fetch_row($count);
        $result1=mysqli_fetch_row($count1);
        $idClient=$result[0];
        $idCommande=$result1[0]+1;
        $sql="insert into commande  (idCommande,idClient, idVetement, quantite, dateCommande, timeCommande) values('".$idCommande."','".$idClient."','".$idVetement."','".$quantite."','".$dateCommande."','".$timeCommande."')";
        echo $sql;
        $valiny=mysqli_query($connect,$sql);
    }

    function AddDetailsCommande($idDetails_commande,$idVetement,$idCommande,$quantite)
    {
        $connect=mysqlconnect();
        $count=mysqli_query($connect,"select MAX(idDetails_commande) from details_commande");
        $result=mysqli_fetch_row($count);
        $id=$result[0]+1;
        $sql="insert into details_commande values('".$id."','".$idClient."','".$idVetement."','".$quantite."','".$dateCommande."','".$timeCommande."','".$montant."'')";
        $valiny=mysqli_query($connect,$sql);
    }

//en cours
    function updateCommande($idCommande,$idClient,$idVetement,$quantite,$dateCommande,$timeCommande,$montant)
    {
        $connect=mysqlconnect();
        $sql="update commande set idCient='".$idClient."',idVetement='".$idVetement."',quantite='".$quantite."',dateCommande='".$dateCommande."',timeCommande='".$timeCommande."',montant='".$montant."' where idCommade=".$idCommande." ";
        $valiny=mysqli_query($connect,$sql);
    }
//men cours
    function getClient()
    {
        $sql = "select * from client";
        $resultat = mysqli_query(mysqlconnect(),$sql);
        while($out = mysqli_fetch_array($resultat))
        {
            $result[]=$out;
        }
        return $result;
    }
//miasa   
    function getVetement()
    {
        $sql = "select * from vetement";
        $resultat = mysqli_query(mysqlconnect(),$sql);
        while($out = mysqli_fetch_array($resultat))
        {
            $result[]=$out;
        }
        return $result;
    }
//tsy ilaina
    function sousTotal()
    {
        $connect=mysqlconnect();
        $sql="SELECT nomVetement, PrixUnitaire, quantite, (PrixUnitaire * quantite) AS sous_total
            FROM vetement
            JOIN commande ON vetement.idVetement = commande.idVetement";
        $result=mysqli_query($connect,$sql);
        if (!$result) {
        die("Erreur lors de l'exécution de la requête : " . mysqli_error($connect));
        }
        $sous_total = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $sous_total[] = $row;
        }
        return $sous_total;
    }  

    
    
?>