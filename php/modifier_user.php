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
    <span> <a href="./index.php">Home</a></span>
    <span> <a href="./backend.php">Recipes List</a></span>
    <span> <a href="./categorie.php">Category List</a></span>
    <span> <a href="./utilisateurs.php">User List</a></span>
    <span><a href="./logout.php">Logout</a></span>
    <div></div>
    <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
    <a href="#"><i class="fa-brands fa-twitter"></i></a>
    <a href="#"><i class="fa-brands fa-instagram"></i></a>
  </div>



  <!-- LOGIN -->
  <div id="login">
  <?php loginpop(); ?>
  </div>
  <!-- FIN LOGIN -->


  <!----------------------------------------->
  <article class="article">
  <?php
  if ($_SERVER['REQUEST_METHOD'] == "GET" and isset($_GET['id'])) {
    $iduser = $_GET['id'];
    moduser($iduser); 
  } else {
    header('Location: ./backend.php');
  }
?>

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