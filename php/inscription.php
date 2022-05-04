<?php 
include './fonction.php';
include './bdd.php';
session_start();

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script type="text/javascript" src=".././js/Myfunctions.js"></script>
  <script src="https://kit.fontawesome.com/59ecaaffaa.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" href=".././css/ajouter.css" />
  <link rel="stylesheet" href=".././css/navbar.css" />
  <link rel="stylesheet" href=".././css/style.css" />
</head>

<body>
  <div id="overlay"></div>
  <!-- BARRE DE MENU -->
  <div class="topnav">
  <?php topnav();?>
  </div>

  <!-- LOGIN -->
  <div id="login">
  <?php loginpop(); ?>
  </div>
  <!-- FIN LOGIN -->

  <!----------------------------------------->
  <article class="article">
  <?php 
  if (isset($_POST['username'])) {
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $requete = "INSERT INTO utilisateurs VALUES(NULL, '" . $_POST['username'] . "', '" . $password . "', '" . $_POST['Prenom'] . "', '" . $_POST['Nom'] . "', '" . $_POST['mail'] . "', '" . $_POST['Nom'] . "', '" . $_POST['avatar'] . "')";
  $resultat = $bdd->query($requete);
  if ($resultat)
      echo "<span>Inscription Validée</span>";
  else
      echo "<p>Erreur</p>";
} ?>
    <h2 class="title_incription">Inscrivez-Vous</h2>
    <form action="./inscription.php" method="post">

      <div class="griduser">
        <label for="username" class="label">Pseudo:</label>
        <input type="text" id="cingr" name="username" placeholder="Pseudo" />
        <label for="Nom" class="label">Nom:</label>
        <input type="text" id="cingr" name="Nom" placeholder="Nom" />
        <label for="Prenom" class="label">Prenom:</label>
        <input type="text" id="cingr" name="Prenom" placeholder="Prénom" />
        <label for="mail" class="label">Email:</label>
        <input type="text" id="cingr" name="mail" placeholder="Email" />
        <label for="Password" class="label">Password:</label>
        <input type="password" id="cingr" name="password" placeholder="password" />
        <label for="file" class="label-file">Ajouter un avatar</label>
        <input id="file" class="input-file" type="file" name="avatar" />
        <div class="bouton">
          <input class="btn_add" type="submit" value="S'inscrire" />
        </div>
      </div>
    </form>

  </article>

  <div class="footernav">
  <?php footernav(); ?>
  </div>

  <footer>
    <div class="footer">
      <p>©2022 Site Recette Formation Simplon</p>
      <a href="#"><i class="fa-brands fa-instagram"></i></a>
      <a href="#"><i class="fa-brands fa-twitter"></i></a>
      <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
    </div>
  </footer>
</body>

</html>