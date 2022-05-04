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
  <script type="text/javascript" src=".././js/Myfunctions.js"></script>
  <script src="https://kit.fontawesome.com/59ecaaffaa.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" href=".././css/style.css" />
  <link rel="stylesheet" href=".././css/navbar.css" />
</head>

<body>
  <div id="overlay"></div>
  <!-- BARRE DE MENU -->
  <div class="topnav">
    <?php topnav();?>
  </div>
  <!----------------------------------------->

  <!-- LOGIN -->
  <div id="login">
    <i class="fa-solid fa-circle-xmark" onclick="off()"></i>
    <h1>Login</h1>
    <form action="./authenticate.php" method="post">
      <label for="username">
        <i class="fa-solid fa-user"></i>
      </label>
      <input type="text" name="username" placeholder="Username" id="username"  />
      <label for="password">
        <i class="fa-solid fa-lock"></i>
      </label>
      <input type="password" name="password" placeholder="Password" id="password"  />
      <input type="submit" value="Login" />
    </form>
  </div>
  <!-- FIN LOGIN -->

  <!-- 1ERE GRID -->
  <article class="article">
   <?php gridtop(); ?>
  </article>

  <article class="article">
    <div class="categories-bar">
      <span class="cat-title">Categories</span>
      <div></div>
      <span class="all-cat">View All Categories</span>
    </div>

    <div class="grid-cat">
      <div class="container-cat-1">
        <img class="cat-img" src=".././images/1.png" />
        <span class="cat-title2">Breakfast</span>
      </div>
      <div class="container-cat-2">
        <img class="cat-img" src=".././images/2.png" />
        <span class="cat-title2">Vegan</span>
      </div>
      <div class="container-cat-3">
        <img class="cat-img" src=".././images/3.png" />
        <span class="cat-title2">Meat</span>
      </div>
      <div class="container-cat-4">
        <img class="cat-img" src=".././images/4.png" />
        <span class="cat-title2">Dessert</span>
      </div>
      <div class="container-cat-5">
        <img class="cat-img" src=".././images/5.png" />
        <span class="cat-title2">Lunch</span>
      </div>
      <div class="container-cat-6">
        <img class="cat-img" src=".././images/6.png" />
        <span class="cat-title2">Chocolate</span>
      </div>
    </div>
  </article>

  <article class="article">
    <div class="div-grid-recettes">
      <span class="title-grid-recettes">Simple and tasty recipes</span>
      <p class="text-grid-recettes">
        Lorem ipsum dolor sit amet, consectetuipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqut enim ad minim
      </p>
    </div>

    <div class="ninegrid">
      <?php grid9();?>
    </div>
  </article>

  <article class="article">
    <grid class="grid_every">
      <!-- grid cell gauche -->
      <itemsG>
        <img src=".././images/rect-blznc.png" />
        <div class="divtext">
          <h1 class="titre-every">
            Everyone can be a
            chef in their own kitchen</h1>
          <p class="text-every">
            Sunt in culpa qui officia deserunt mollit anim id Sunt in culpa
            qui officia deserunt mollit anim id
          </p>
        </div>
        <div class="view_every">
          <span class="btn-learn"><a class="link" href="http://">Learn More</a></span>
        </div>
      </itemsG>

      <!-- grid cell droite -->
      <itemsD>
        <div class="jongleur">
          <div class="steak"><img src=".././images/image21.png" /></div>
          <div class="salade"><img src=".././images/image22.png" /></div>
          <div class="tomates"><img src=".././images/image23.png" /></div>
          <div class="onion"><img src=".././images/image24.png" /></div>
          <img class="img_jongleur" src=".././images/dd.png" />
        </div>
      </itemsD>
    </grid>
  </article>

  <article class="article">
    <div class="grid88">
      <div class="cellGT">
        <h1 class="titre-cell88">
          Try this delicious recipe to make your day
        </h1>
      </div>
      <div class="cellDT">
        <p class="text-cell88">
          Lorem ipsum dolor sit amet, consectetuipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqut enim ad minim
        </p>
      </div>
    </div>
  </article>

  <!-- GRID 88______________________________ -->

  <article class="article">
    <div class="grid888">
    <?php grid8(); ?>
    </div>
  </article>

  <article class="article">
    <div class="delicious">
      <h1 class="titre-delicious">Deliciousness to your inbox</h1>
      <p class="text-delicious">
        Lorem ipsum dolor sit amet, consectetuipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqut enim ad minim
      </p>
      <div class="mailbar">
        <div class="formail">
          <span class="ymail">Your email here...</span>
          <div class="btn-mail"><a class="link" href="http://"> Subscribe</a></div>
        </div>
      </div>
      <img class="imgsalad" src=".././images/salads.png" />
      <img class="imgsalad2" src=".././images/22.png" />
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