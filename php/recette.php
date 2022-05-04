<?php
include('./bdd.php');
include('./fonction.php');
session_start();
?>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/59ecaaffaa.js" crossorigin="anonymous"></script>

  <title>Document</title>
  <script type="text/javascript" src=".././js/Myfunctions.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" href=".././css/recettes.css" />
  <link rel="stylesheet" href=".././css/navbar.css" />
  <link rel="stylesheet" href=".././css/style.css" />
</head>

<body>
  <div id="overlay"></div>
  <div class="topnav">
  <?php topnav();?>
  </div>
  <!----------------------------------------->

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



  
  <?php
           OneReceipe();
           ?>





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
          <div class="btn-mail">Subscribe</div>
        </div>
      </div>
      <img class="imgsalad" src=".././images/salads.png" />
      <img class="imgsalad2" src=".././images/22.png" />
    </div>
  </article>

  <article class="article">
    <h2 class="title-grid-888">You may like these recipe too</h2>
    <div class="grid889">
     <?php grid4(); ?>
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