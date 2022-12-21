<?php 
   session_start();
   $con = mysqli_connect("localhost","root","","phpinscri");
//verifier la connexion
if(!$con) {
    die('Erreur : '.mysqli_connect_error());
}

   //supprimer les produits
   //si la variable del existe
   if(isset($_GET['del'])){
    $id_del = $_GET['del'] ;
    //suppression
    unset($_SESSION['phpinscri'][$id_del]);
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="panier">
    <a href="index2.php" class="link">Boutique</a>
    <section>
        <table>
            <tr>
                <th></th>
                <th>Nom</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Action</th>
            </tr>
            <?php 
              $total = 0 ;
              // liste des produits
              //récupérer les clés du tableau session
              $ids = array_keys($_SESSION['phpinscri']);
              //s'il n'y a aucune clé dans le tableau
              if(empty($ids)){
                echo "Votre panier est vide";
              }else {
                //si oui 
                $products = mysqli_query($con, "SELECT * FROM article WHERE id_article IN (".implode(',', $ids).")");

                //lise des produit avec une boucle foreach
                foreach($products as $product):
                    //calculer le total ( prix unitaire * quantité) 
                    //et aditionner chaque résutats a chaque tour de boucle
                    $total = $total + $product['prix'] * $_SESSION['phpinscri'][$product['id_article']] ;
                ?>
                <tr>
                    <td><img src="img1"<?=$product['image']?>"></td>
                    <td><?=$product['nom']?></td>
                    <td><?=$product['prix']?>€</td>
                    <td><?=$_SESSION['phpinscri'][$product['id_article']] // Quantité?></td>
                    <td><a href="panier.php?del=<?=$product['id_article']?>"><img src="delete.png"></a></td>
                </tr>

            <?php endforeach ;} ?>

            <tr class="total">
                <th>Total : <?=$total?>€</th>
            </tr>
        </table>
    </section>


    <a href="card.php" class="link">Paiement instantané</a>
    <a href="#" class="link">Négociation</a>
    <a href="# " class="link">Enchère</a>
</body>
</html>