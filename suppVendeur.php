<?php

session_start();
if(isset($_POST['submit'])){
$nom = isset($_POST["nom"]) ? $_POST["nom"] : "";
$pseudo = isset($_POST["pseudo"]) ? $_POST["pseudo"] : "";
$email = isset($_POST["email"]) ? $_POST["email"] : "";
$password1 = isset($_POST["password"])? $_POST["password"] : "";


if($nom!="" && $pseudo!="" && $ $email="" && $password1!=""){

	$db_handle = mysqli_connect("localhost" , "root" ,"", "phpinscri");
	$sql = "DELETE FROM `vendeur` (`id_vendeur`,`nom`, `pseudo`,`email`,`password`,`id_admin`) VALUES (NULL,'$nom','$prenom','$email','$password1','1');";
	$result=mysqli_query($db_handle,$sql);

}

if($nom == ''){
    echo "Veuillez entrer un nom";
    return;
}
if($pseudo == ''){
    echo "Veuillez entrer un prenom";
    return;
}
if($email == ''){
    echo "Veuillez entrer un email";
    return;
}


}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supp vendeur</title>
</head>
<body>
	<h2> Supprimer un vendeur </h2>
	<form action="Items.php" method="post">
		<table>
			<tr>
				<td>Pseudo:</td>
				<td><input type="text" name="pseudo"></td>
			</tr>
			<tr>
				<td>nom:</td>
				<td><input type="text" name="nom"></td>
			</tr>
			<tr>
			<td>Email : </td>
				<td><input type="text" name="email"></td>
			</tr>
				<td colspan="2" align="center">
					<input type="submit" name="submit" value="supprimer">
				</td>
				</tr>
		</table>
	</form>

	<a href="ajouter_un_article.php">Ajouter un article</a>
	<a href="ajouterVendeur.php">Ajouter un vendeur</a>
</body>
</html>