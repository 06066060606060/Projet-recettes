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
    <span> <a href="./backend.php">Recipies List</a></span>
    <span> <a href="./categorie.php">Category List</a></span>
    <span><a href="./logout.php">Logout</a></span>
  </div>

  <!----------------------------------------->
  <article class="article">
    <h2 class="title_add">Add new Category</h2>
    <form action="/action_page.php">

      <div class="griduser">
        <label for="Nom" class="label">Name:</label>
        <input type="text" id="cingr" name="Nom" placeholder="Name" />
        <label for="file" class="label-file">Add an icon</label>
        <input id="file" class="input-file" type="file" />
        <div class="bouton">
          <input class="btn_add" type="submit" value="Add Category" />
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