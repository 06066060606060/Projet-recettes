<?php
include './fonction.php';
session_start();
//var_dump($_SESSION)

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

  <!-- BARRE DE MENU -->
  <div class="topnav">
    <a class="logo" href="#"><img src=".././images/Foodieland.png" /></a>
    <div class="spacer"></div>
    <?php   if (isset($_SESSION['id'])){
  if ($_SESSION['id'] == '4') {
    echo '
    <span> <a href="./index.php">Home</a></span>
    <span> <a href="./categorie.php">Category List</a></span>
    <span> <a href="./utilisateurs.php">User List</a></span>
    <span> <a href="./ajouter.php">Add a new Recipe</a></span>
    <span onclick=""><a href="./logout.php">Logout</a></span>';
  } else {
    echo '
    <span> <a href="./index.php">Home</a></span>
    <span> <a href="./ajouter.php">Add a new Recipe</a></span>
    <span> <a href="./categorie.php">Category List</a></span>
    <span> <a href="./backend.php">My Recipes</a></span>
    <span onclick=""><a href="./logout.php">Logout</a></span>';
  }
 } ?>
    <div></div>
  </div>


  <!----------------------------------------->
  <article class="article">
    <div class="table-responsive">

 <?php   if (isset($_SESSION['id'])){
  if ($_SESSION['id'] == '4') {
      echo "<h5 class=''>Welcome Admin</h2>";
      echo "<h2 class='title_liste'>List of all Recipes:</h2>";      
    }
  else if ($_SESSION['id'] != '4') {
      echo "<h4 class=''>Welcome</h4>";
      echo  "<h4 class=''>", $_SESSION['name'] ,"</h4>";
      echo "<h2 class='title_liste'>Liste of your Recipes</h2>";
  }
 } ?>
      <table class="table table-hover table-bordered">
        <thead>
          <th>ID</th>
          <p>
          <th>title</th>
          <p>
            <th>picture</th>
          <p>
            <th>resume</th>
          <p>
            <th>category</th>
          <p>
            <th>Type</th>
          <p>
            <th>Manage</th>
          <p>
          <th>In Front</th>
          <p>
        </thead>

        <tbody>
          <?php crudrecette(); ?>
        </tbody>
      </table>
    </div>
  

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