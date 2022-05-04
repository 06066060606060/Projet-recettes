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
    <span> <a href=".././inscription.html">Ajouter utilisateur</a></span>
    <span onclick=""><a href="#">Logout</a></span>
    <div></div>
  </div>

  <!----------------------------------------->
  <article class="article">
    <div class="table-responsive">
      <h2 class="title_liste">Liste des Utilisateurs</h2>
      <table class="table table-hover table-bordered">
        <thead>
          <th>Pseudo</th>
          <p>
          <th>Avatar</th>
          <p>
            <th>Prénom</th>
          <p>
            <th>Nom</th>
          <p>
            <th>Role</th>
            <p>
              <th>Email</th>
          <p>
            <th>Edition</th>
          <p>
            <th>Supprimer</th>
          <p>

        </thead>

        <tbody>
          <tr>
            <p>
              <td>Admin</td>
            <td><img src=".././images/Ellipse2.png"></td>
            <p>
              <td>John</td>
            <p>
              <td> Smith </td>
            <p>
              <td>Admin</td>
            <p>
              <td>cdsfsfer@mail.com</td>
              <p>
              <td><a class="btn btn-success" href="modifier_user.html">Modifier</a></td>
            <p>
              <td><a class="btn btn-danger" href="">Supprimer</a></td>
            <p>
          </tr>
          <tr>
            <p>
              <td>Nico</td>
            <td><img src=".././images/avatar2.png"></td>
            <p>
              <td>Nico</td>
            <p>
              <td> test </td>
            <p>
              <td>User</td>
              <p>
                <td>cdsfsfer@mail.com</td>
                <p>
              <td><a class="btn btn-success" href="./modifier.html">Modifier</a></td>
            <p>
              <td><a class="btn btn-danger" href="">Supprimer</a></td>
            <p>
          </tr>
          <p>
        </tbody>
      </table>
    </div>
  </article>



  <div class="footernav">
    <a class="logofoot" href="#"><img src=".././images/Foodieland.png" /></a>
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