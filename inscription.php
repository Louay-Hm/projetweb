<?php



if(isset($_POST['boutton'])){
    $Nom = isset($_POST["nom"])? $_POST["nom"] : "";
    $Prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
    $Email = isset($_POST["email"])? $_POST["email"] : "";
    $password1 = isset($_POST["password"])? $_POST["password"] : "";
    $password2 = isset($_POST["password_retype"])? $_POST["password_retype"] : "";
    $AdresseL1 = isset($_POST["adresse_1"])? $_POST["adresse_1"] : "";
    $AdresseL2 = isset($_POST["adresse_2"])? $_POST["adresse_2"] : "";
    $Ville = isset($_POST["ville"])? $_POST["ville"] : "";
    $CodeP = isset($_POST["postale"])? $_POST["postale"] : "";
    $Pays = isset($_POST["pays"])? $_POST["pays"] : "";
    $Num = isset($_POST["telephone"])? $_POST["telephone"] : "";

    
    $message ="";
    $database="phpinscri";

    if ($Nom!="" && $Prenom!="" && $Email!="" && $password1!="" && $password2!="" && $AdresseL1!="" && $Ville!="" && $CodeP!="" && $Pays!="" && $Num!="") {
        if($password1!=$password2){
            $message="Veuillez retaper correctement votre Mot de passe.";
        }
        else{
            $db_handle = mysqli_connect('localhost' , 'root' ,"" , $database);
            if($db_handle){
                // Création d'un panier associé au compte
                $query=mysqli_query($db_handle,"INSERT INTO `panier` (`id_panier`) VALUES (NULL);");

                // Recherche de ce panier pour associer son id au compte
                $query=mysqli_query($db_handle,"SELECT MAX(id_panier) FROM `panier`;");
                $pan=mysqli_fetch_assoc($query);
                $id_pan=$pan['MAX(id_panier)'];
                
                // Création du compte client
                $sql="INSERT INTO `users` (`id`, `email`, `nom`, `prenom`, `password`, `adresse_1`, `adresse_2`, `ville`, `postale`, `pays`, `telephone`, `id_panier`) VALUES (NULL, '$Email', '$Nom', '$Prenom', '$password1', '$AdresseL1', '$AdresseL2', '$Ville', '$CodeP', '$Pays', '$Num', $id_pan);";
                $result=mysqli_query($db_handle,$sql);
            }
            else{
                $message="Database inconnue";
            }
            if($result){
                $message="Félicitations ! Vous êtes bien inscrit.";
            }
            else{
                $message = "Probleme de code";
            }
            mysqli_close($db_handle);
        }
        
    }
    else{
        $message= "Veuillez remplir toutes les cases.";
    }
}
?>

<!DOCTYPE html>
<html>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="best.css" rel="stylesheet" type="text/css">
    <link href="inscription.css" rel="stylesheet" type="text/css">
    <link href="attente.css" rel="stylesheet" type="text/css">
    <title>Compte</title>
</head>

<body>
  
  <!-- Navigation-->

  <header>
        
        <a href="Ecom.html" class="logo"><img src="logo.png" alt="logo" width="20" height="20"><span>O</span>mnesMarket</a>
        <div class="menuToggle" onclick="toggleMenu();"></div>
        <ul class="navbar">
            <li><a href="Ecom.html" onclick="toggleMenu();">🏠Accueil</a></li>
            <li><a href="Tout_parcourir.html" onclick="toggleMenu();">📘Tout Parcourir</a></li>
            <li><a href="#" onclick="toggleMenu();">🔔Notification</a></li>
            <li><a href="connexion.php" onclick="toggleMenu();">🛒Panier</a></li>
            <li><a href="connexion.php" onclick="toggleMenu();">👤Votre compte</a></li>
            <li><a href="https://www.google.com/maps/place/ECE+-+Ecole+d'ing%C3%A9nieurs+-+Campus+de+Lyon/@45.7510385,4.8379837,17z/data=!3m1!4b1!4m5!3m4!1s0x47f4ebae39b2bcb7:0xfbdd39965bd93404!8m2!3d45.7510385!4d4.8401724" target="_blank" onclick="toggleMenu();">🚀Google Maps</a></li>
            <a href="connexionvendeur.php" class="btn-reserve"onclick="toggleMenu();">Vendre</a>
        </ul>
    </header>
  

  <!-- Header-->
  
  <!-- Contenue du Website-->
  <div class="container">
        <form method="POST" action="">
          <p>Inscription</p>
          <input type="text" name="nom" placeholder="Nom"><br>
          <input type="text" name="prenom" placeholder="Prénom"><br>
          <input type="text" name="adresse_1" placeholder="Adresse 1"><br>
          <input type="text" name="adresse_2" placeholder="Adresse 2"><br>
          <input type="text" name="ville" placeholder="Ville"><br>
          <input type="text" name="postale" placeholder="Code postale"><br>
          <input type="text" name="telephone" placeholder="Numéro de téléphone"><br>
          <input type="text" name="pays" placeholder="Pays"><br>
          <input type="text" name="email" placeholder="Email"><br>
          <input type="password" name="password" placeholder="Mot de passe"><br>
          <input type="password" name="password_retype" placeholder="Retaper le mot de passe"><br>
          <input type="submit" name="boutton" value="S'inscrire"><br>
          <a href="connexion.php">Connexion</a>
        </form>

        <br><br>
            <input type="checkbox" id="politique" name="politique" checked>
            <label for="politique">Accepter nos condition</label>
            <p><small>* Champs obligatoire</small><p>
            <button type="submit" name="boutton">Accepter</button>
            
            <?php
	        if(isset($message) && $message!=""){
                echo "<p><small>".$message."</small></p>"  ;
            }
            ?>
    
    
        </div>
      </form>
      <br><br><br>

  
  </div>    


  
</body>

</html>