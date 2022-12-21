 <?php 
 session_start() ;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Panier</title>
    
</head>
<body>
    <!-- afficher le nombre de produit dans le panier -->
    <a href="panier.php" class="link">Panier<span><?array_sum($_SESSION['phpinscri'])?></span></a>
    <section class="products_list">
        <?php 
        //inclure la page de connexion
        $con = mysqli_connect("localhost","root","","phpinscri");
//verifier la connexion
if(!$con) {
    die('Erreur : '.mysqli_connect_error());
}
        //afficher la liste des produits
         $req = mysqli_query($con, "SELECT * FROM article");
         while($row = mysqli_fetch_assoc($req)){ 
        ?>
        <form action="" class="product">
            <div class="image_product">
                <img src="project_images/<?=$row['image']?>">
            </div>
            <div class="content">
                <h4 class="name"><?=$row['nom']?></h4>
                <h2 class="price"><?=$row['prix']?>€</h2>
                <a href="ajouter_panier.php?id_article=<?=$row['id_article']?>" class="id_product">Ajouter au panier</a>
            </div>
        </form>

        <?php } ?>
       
    </section>
</body>
</html>