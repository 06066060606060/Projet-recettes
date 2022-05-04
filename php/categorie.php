
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
  <link rel="stylesheet" href=".././css/backend.css" />
</head>

<body>
  <div id="overlay"></div>
  <!-- BARRE DE MENU -->
  <div class="topnav">
    <a class="logo" href="#"><img src=".././images/Foodieland.png" /></a>
    <div class="spacer"></div>
    <span> <a href=".././index.html">Accueil</a></span>
    <span> <a href="./backend.html">Liste des recettes</a></span>
    <span onclick=""><a href="#">Logout</a></span>
    <div></div>
  </div>

  <!----------------------------------------->
  <article class="article">
    <div class="table-responsive">
      <h2 class="title_liste">Liste des Catégories</h2>
    
      <table class="table table-hover table-bordered">
        <thead>
          <th>Id</th>
          <p>
          <th>Nom</th>
            <p>
            <th>Icone</th>
          <p>
            <th>Supprimer</th>
          <p>

        </thead>

        <tbody>
          <tr>
            <td>1</td>
            <p>
              <td>Viande</td>
            <p>
              
              <td><img src=".././images/3.png"></td>
            <p>
              <td><a class="btn btn-danger" href="">Supprimer</a></td>
            <p>
          </tr>

        </tbody>

      </table>
    </div>

  </article>
  <a class="btnadd" href="./ajouter_cat.html">Ajouter Une Catégorie</a>


  <div class="footernav">
    <a class="logofoot" href="#"><img src=".././images/Foodieland.png" /></a>
    <div class="spacerfoot"></div>
    <span> <a href=".././index.html">Accueil</a></span>
    <span> <a href=".././recette.html">Recettes</a></span>
    <span><a href=".././contact.html">Contact</a></span>
    <span><a href=".././inscription.html">Inscription</a></span>
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