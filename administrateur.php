<?php 
 //Nous allons démarrer la session avant toute chose
   session_start() ;
  if(isset($_POST['submit'])){ // Si on clique sur le boutton , alors :
    //Nous allons verifiér les informations du formulaire
    if(isset($_POST['pseudo']) && isset($_POST['password'])) { //On verifie ici si l'utilisateur a rentré des informations
      //Nous allons mettres l'email et le mot de passe dans des variables
        $email = $_POST['pseudo'] ;
        $password = $_POST['password'] ;
        $erreur = "" ;
       
       $nom_serveur = "localhost";
       $utilisateur = "root";
       $mot_de_passe ="";
       $nom_base_données ="phpinscri" ;
       $con = mysqli_connect($nom_serveur , $utilisateur ,$mot_de_passe , $nom_base_données);
       //requete pour selectionner  l'utilisateur qui a pour email et mot de passe les identifiants qui ont été entrées
        $req = mysqli_query($con , "SELECT * FROM admin WHERE pseudo = '$email' AND password ='$password' ") ;
        $num_ligne = mysqli_num_rows($req) ;//Compter le nombre de ligne ayant rapport a la requette SQL
        if($num_ligne > 0){
            header("Location:ajouterVendeur.php") ;//Si le nombre de ligne est > 0 , on sera redirigé vers la page bienvenu
            // Nous allons créer une variable de type session qui vas contenir l'email de l'utilisateur
            $_SESSION['email'] = $email ;
        }else {//si non
            $erreur = "Adresse Mail ou Mots de passe incorrectes !";
        }
    }
  }
?>


<!DOCTYPE html>
<html lang="en">
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


    <header>
        
        <a href="Ecom.html" class="logo"><img src="logo.png" alt="logo" width="20" height="20"><span>O</span>mnesMarket</a>
        <div class="menuToggle" onclick="toggleMenu();"></div>
        <ul class="navbar">
            <li><a href="Ecom.html" onclick="toggleMenu();">🏠Accueil</a></li>
            <li><a href="#" onclick="toggleMenu();">📘Tout Parcourir</a></li>
            <li><a href="#" onclick="toggleMenu();">🔔Notification</a></li>
            <li><a href="#" onclick="toggleMenu();">🛒Panier</a></li>
            <li><a href="connexion.php" onclick="toggleMenu();">👤Votre compte</a></li>
            <li><a href="https://www.google.com/maps/place/ECE+-+Ecole+d'ing%C3%A9nieurs+-+Campus+de+Lyon/@45.7510385,4.8379837,17z/data=!3m1!4b1!4m5!3m4!1s0x47f4ebae39b2bcb7:0xfbdd39965bd93404!8m2!3d45.7510385!4d4.8401724" target="_blank" onclick="toggleMenu();">🚀Google Maps</a></li>
            <a href="#" class="btn-reserve"onclick="toggleMenu();">Vendre</a>
        </ul>
    </header>

    <!--Compte-->
    <!-- <?php 
       if(isset($erreur)){// si la variable $erreur existe , on affiche le contenu ;
           echo "<p class= 'Erreur'>".$erreur."</p>"  ;
       }
       ?>-->
    <div class="container">
        <form method="POST" action="">
          <p>Administrateur</p>
          <input type="text" name ="pseudo" placeholder="Pseudo"><br>
          <input type="password" name ="password" placeholder="Mot de passe"><br>
          <input type="submit" name="submit" values="Connexion"><br>
          <a href="#">Connection à la base</a>
        </form>
      
        <div class="drop drop-1"></div>
        <div class="drop drop-2"></div>
        <div class="drop drop-3"></div>
        <div class="drop drop-4"></div>
        <div class="drop drop-5"></div>
      </div>

      <!--Fin du compte-->



    
    <script src="attente.js"></script>


    
</body>
</html>