<?php
    function mysqlconnect()
    {
        $bdd = mysqli_connect('localhost','root','root','wb');
        mysqli_set_charset($bdd, "utf8");

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

    function AddDetailsFacture($idCommande,$idFacture){
        $connect=mysqlconnect();
        $sql="insert into details_facture  (idCommande, idFacture) values('".$idCommande."','".$idFacture."')";
        $valiny=mysqli_query($connect,$sql);
    }

    function AddFacture($idClient){
        $connect=mysqlconnect();
        $sql="insert into facture  (idClient) values('".$idClient."')";
        $valiny=mysqli_query($connect,$sql);
    }

    function getDernierClient(){
        $connect=mysqlconnect();
        $count=mysqli_query($connect,"select MAX(idClient) from client");
        $result=mysqli_fetch_row($count);
        return $result[0];
    }

    function getDernierFacture(){
        $connect=mysqlconnect();
        $count=mysqli_query($connect,"select MAX(idFacture) from facture");
        $result=mysqli_fetch_row($count);
        return $result[0];
    }

    function getDernierCommande(){
        $connect=mysqlconnect();
        $count=mysqli_query($connect,"select MAX(idCommande) from commande");
        $result=mysqli_fetch_row($count);
        return $result[0];
    }

    function getNombreCommandeParVetement($idVetement){
        $connect=mysqlconnect();
        $count=mysqli_query($connect,"select SUM(commande.quantite) from commande where idVetement =".$idVetement);
        $result=mysqli_fetch_row($count);
        return $result[0];
    }

    function getTotalFacture($idFacture)
    {
        $connect=mysqlconnect();
        $sql="select facture_vue.idFacture,SUM(facture_vue.sous_total) as total from facture_vue  where idFacture =".$idFacture;
        $resultat = mysqli_query(mysqlconnect(),$sql);
        while($out = mysqli_fetch_array($resultat))
        {
            $result[]=$out;
        }
        return $result;

    }

    function getAllFacture()
    {
        $sql = "SELECT f.idFacture, c.idClient, c.nom, c.email, c.telephone
                FROM facture f 
                JOIN client c ON f.idClient = c.idClient;";
        $resultat = mysqli_query(mysqlconnect(),$sql);
        while($out = mysqli_fetch_array($resultat))
        {
            $result[]=$out;
        }
        return $result;
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

    function getView($idFacture)
    {
        $connect=mysqlconnect();
        $sql="SELECT * FROM facture_vue where idFacture =".$idFacture;
        $resultat = mysqli_query(mysqlconnect(),$sql);
        while($out = mysqli_fetch_array($resultat))
        {
            $result[]=$out;
        }
        return $result;
    }
    
?>