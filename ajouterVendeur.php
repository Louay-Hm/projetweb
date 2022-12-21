<?php

session_start();
if(isset($_POST['submit'])){
$nom = isset($_POST["nom"]) ? $_POST["nom"] : "";
$pseudo = isset($_POST["pseudo"]) ? $_POST["pseudo"] : "";
$email = isset($_POST["email"]) ? $_POST["email"] : "";
$password1 = isset($_POST["password"])? $_POST["password"] : "";


if($nom!="" && $pseudo!="" && $email!="" && $password1!=""){

	$db_handle = mysqli_connect("localhost" , "root" ,"", "phpinscri");
	$sql = "INSERT INTO `vendeur` (`id_vendeur`,`nom`,`photo`, `pseudo`,`email`,`password`,`id_admin`) 
	VALUES (NULL,'$nom',NULL,'$pseudo','$email','$password1','1');";
	$result=mysqli_query($db_handle,$sql);
	echo "Test";
	
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
    <title>Ajout vendeur</title>
</head>
<body>
	<h2> Ajouter un vendeur </h2>
	<form action="" method="post">
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
			<tr>
				<td>Mot de passe:</td>
				<td><input type="password" name="password"></td>
			</tr>
		
			<tr>
				<td colspan="2" align="center">
					<input type="submit" name="submit" value="Valider">
				</td>
				</tr>
		</table>
	</form>
	<a href="suppVendeur.php">Supprimer</a>
	<a href="ajouter_un_article.php">Ajouter un article</a>
</body>
</html>