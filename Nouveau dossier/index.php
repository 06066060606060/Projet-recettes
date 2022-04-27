<?php
include('./bdd.php');
include('./fonction.php');

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/59ecaaffaa.js"
      crossorigin="anonymous"
    ></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    <link rel="stylesheet" href="./css/style.css" />
  </head>
  <body>

    <div class="topnav">
      <a class="logo" href="#"><img src="./images/Foodieland.png"></a>
      <div></div>
      <a href="#">Home</a>
      <a href="#">Recipes</a>
      <a href="#">Blog</a>
      <a href="#">Contact</a>
      <a href="#">About us</a>
      <div></div>
      <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
      <a href="#"><i class="fa-brands fa-twitter"></i></a>
      <a href="#"><i class="fa-brands fa-instagram"></i></a>
    </div>

    <div class="row">
      <div class="container">
        <div class="section">
            <h5> icone </h5>
          <h1 class="titre-recette">Spicy delicious chicken wings</h1>
          <div class="fakeimg" style="height: 200px">Image</div>
          <p>
           <?php
           indexpage();
           ?>
          </p>
        </div>
        </div>
      </div>
    </div>


  </body>
</html>