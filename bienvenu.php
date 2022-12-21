
<?php 
//On demare la session sur sur cette page 
session_start() ;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="vendeur.css"/>
    <title>Document</title>
  </head>
  <body>


  <?php
     //Ensuite on affiche le contenu de la variable session
     echo "<p class ='message'> Bienvenu à toi " .$_SESSION['email'] ."</p>";
    ?>




    <div class="wrapper">
      <div class="profile-top">
        <div class="profile-image"></div>
      </div>

      <div class="profile-bottom">
        <div class="profile-infos">
          <div class="main-infos">
            <h3 class="name"><?php  echo "<p class ='message'>" . $_SESSION['email'] ."</p>"?></h3>
            <p class="age grey"></p>
          </div>
          <p class="email"><?php
     //Ensuite on affiche le contenu de la variable session
     echo "<p class ='message'>". $_SESSION['email'] ."</p>";
    ?></p>
          <p class="ville"><ion-icon name="location"></ion-icon>Paris</p>
        </div>

        <div class="profile-stats">
          <div class="stat-item">
            <p class="stat">0</p>
            <p class="grey">Ventes</p>
          </div>
          <div class="stat-item">
            <p class="stat">0</p>
            <p class="grey">Avis</p>
          </div>
          <div class="stat-item">
            <p class="stat">0</p>
            <p class="grey">Photos</p>
          </div>
        </div>
      </div>
    </div>
    <script
      type="module"
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
    ></script>


    <a href="ajouter_un_article.php">Ajouter un article</a>

  </body>
</html>