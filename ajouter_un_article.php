<?php

if(isset($_POST['submit'])){
    $Nom = isset($_POST["nom"])? $_POST["nom"] : "";
    $Prix = isset($_POST["prix"])? $_POST["prix"] : "";
    $description = isset($_POST["description"])? $_POST["description"] : "";
    $image = isset($_POST["photo"])? $_POST["photo"] : "";
    $categorie = isset($_POST["categorie"])? $_POST["categorie"] : "";
    


    $error= "";
    
 

    if($Nom!="" && $categorie!="" && $description!="" && $Prix!="" && $image!=""){
        
        $db_handle = mysqli_connect('localhost' , 'root' ,"" , "phpinscri");
        if($db_handle){            
            $result=mysqli_query($db_handle,"INSERT INTO `article` (`nom`, `prix`, `image`, `description`, `categorie`) VALUES ('$Nom', '$Prix','$image', '$description', '$categorie');");       
        
            if($result){

               
                $query=mysqli_query($db_handle,"SELECT id_vendeur FROM `vendeur` WHERE pseudo='$log' ;");
                $vendre=mysqli_fetch_assoc($query);
                $id_vendeur=$vend['id_vendeur'];
        
                $query=mysqli_query($db_handle,"SELECT MAX(id_article) FROM `article`;");
                $product=mysqli_fetch_assoc($query);
                $id_article=$product['MAX(id_article)'];


                $result2=mysqli_query($db_handle,"INSERT INTO `vendre` (`id_vendeur`, `id_article`) VALUES ($id_vendeur, $id_article,)");

                if($result2){
                    $error="Un nouveau produit a été ajouté.";
                }
                else{
                    $error="erreur";
                }

                

            }
            else{
                $error = "Problème de code";
            }
        }
    }
    else{
        $error= "Veuillez remplir toutes les cases.";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
<title> Objets à vendre</title>
<meta charset="utf-8">
	</head>
<body>
	<h2> Objets à vendre </h2>
	<form action="" method="post">
		<table>
			<tr>
				<td>nom:</td>
				<td><input type="text" name="nom"></td>
			</tr>
			<tr>
			<td>Photo:</td>
				<td><input type="file" name="photo"></td>
			</tr>
			<tr>
				<td>descriptions:</td>
				<td><input type="text" name="descriptions"></td>
			</tr>
			<tr>
				<td>categorie:</td>
				<td><input type="text" name="categorie"></td>
			</tr>
			<tr>
				<td>prix:</td>
				<td><input type="text" name="prix"></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<input type="submit" name="submit" value="Valider">
				</td>
				</tr>
		</table>
	</form>
</body>

</html>