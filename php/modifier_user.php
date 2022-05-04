<?php 
include './fonction.php';
session_start();
?>
<!DOCTYPE html>
<html>


<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script type="text/javascript" src="./js/Myfunctions.js"></script>
  <script src="https://kit.fontawesome.com/59ecaaffaa.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" href=".././css/style.css" />
  <link rel="stylesheet" href=".././css/navbar.css" />
  <link rel="stylesheet" href=".././css/ajouter.css" />
</head>

<body>
  <div id="overlay"></div>
  <!-- BARRE DE MENU -->
  <div class="topnav">
    <a class="logo" href="#"><img src=".././images/Foodieland.png" /></a>
    <div class="spacer"></div>
    <span> <a href=".././index.html">Accueil</a></span>
    <span> <a href=".././recette.html">Recettes</a></span>
    <span><a href=".././contact.html">Contact</a></span>
    <span><a href=".././inscription.html">Inscription</a></span>
    <span onclick="on()"><a href="#">Login</a></span>
    <div></div>
    <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
    <a href="#"><i class="fa-brands fa-twitter"></i></a>
    <a href="#"><i class="fa-brands fa-instagram"></i></a>
  </div>



  <!-- LOGIN -->
  <div id="login">
    <i class="fa-solid fa-circle-xmark" onclick="off()"></i>
    <h1>Login</h1>
    <form action="./backend/backend.html" method="post">
      <label for="username">
        <i class="fa-solid fa-user"></i>
      </label>
      <input type="text" name="theusername" placeholder="Username" id="username" required />
      <label for="password">
        <i class="fa-solid fa-lock"></i>
      </label>
      <input type="password" name="thepassword" placeholder="Password" id="password" required />
      <input type="submit" value="Login" />
    </form>
  </div>
  <!-- FIN LOGIN -->


  <!----------------------------------------->
  <article class="article">
    <h2 class="title_incription">Modifier Utilisateur</h2>
    <form action="/action_page.php">

      <div class="griduser">
        <label for="Pseudo" class="label">Pseudo:</label>
        <input type="text" id="cingr" name="Pseudo" placeholder="Pseudo" />
        <label for="Nom" class="label">Nom:</label>
        <input type="text" id="cingr" name="Nom" placeholder="Nom" />
        <label for="Prenom" class="label">Prenom:</label>
        <input type="text" id="cingr" name="Prenom" placeholder="Prénom" />
        <label for="Prenom" class="label">Email:</label>
        <input type="text" id="cingr" name="mail" placeholder="Email" />
        <label for="role" class="label">Role:</label>
        <input type="text" id="cingr" name="role" placeholder="Role" />
        <label for="Password" class="label">Password:</label>
        <input type="password" id="cingr" name="password" placeholder="password" />
        <div class="bouton">
          <input class="btn_add" type="submit" value="S'inscrire" />
        </div>
      </div>
    </form>
  </article>

  <div class="footernav">
    <a class="logofoot" href="#"><img src=".././images/Foodieland.png" /></a>
    <div class="spacerfoot"></div>
    <span> <a href="./index.html">Accueil</a></span>
    <span> <a href="./recette.html">Recettes</a></span>
    <span><a href="./contact.html">Contact</a></span>
    <span><a href="./inscription.html">Inscription</a></span>
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