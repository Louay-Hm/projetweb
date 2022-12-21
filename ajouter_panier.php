<?php
//inclure la page de connexion
$con = mysqli_connect("localhost","root","","phpinscri");
//verifier la connexion
if(!$con) {
    die('Erreur : '.mysqli_connect_error());
}
 //verifier si une session existe
 if(!isset($_SESSION)){
    //si non demarer la session
    session_start();
 }
 //creer la session
 if(!isset($_SESSION['phpinscri'])){
    //s'il nexiste pas une session on créer une et on mets un tableau a l'intérieur 
    $_SESSION['phpinscri'] = array();
 }
 //récupération de l'id dans le lien
  if(isset($_GET['id_article'])){//si un id a été envoyé alors :
    $id = $_GET['id_article'] ;
    //verifier grace a l'id si le produit existe dans la base de  données
    $produit = mysqli_query($con ,"SELECT * FROM article WHERE id_article = $id") ;
    if(empty(mysqli_fetch_assoc($produit))){
        //si ce produit n'existe pas
        die("Ce produit n'existe pas");
    }
    //ajouter le produit dans le panier ( Le tableau)

    if(isset($_SESSION['phpinscri'][$id])){// si le produit est déjà dans le panier
        $_SESSION['phpinscri'][$id]++; //Représente la quantité 
    }else {
        //si non on ajoute le produit
        $_SESSION['phpinscri'][$id]= 1 ;
    }

   //redirection vers la page index.php
   header("Location:panier.php");


  }
?>