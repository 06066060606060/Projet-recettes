<?php 
include './fonction.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script type="text/javascript" src=".././js/Myfunctions.js"></script>
  <title>Document</title>
  <link rel="stylesheet" href=".././css/contact.css" />
  <link rel="stylesheet" href=".././css/navbar.css" />
  <link rel="stylesheet" href=".././css/style.css" />
  <script src="https://kit.fontawesome.com/59ecaaffaa.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
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
  <?php loginpop(); ?>
  </div>
  <!-- FIN LOGIN -->

  <article class="article">
    <h2 class="title_contact">Contact us</h2>
    <grid class="grid_contact">
      <div class="gridG">
        <div class="image_contact">
          <img src=".././images/Group 13936.png" />
        </div>
      </div>
      <div class="gridD">
        <div class="form_contact">
          <form action="/action_page.php">
            <label for="fname">NAME</label>
            <input type="text" id="fname" name="firstname" placeholder="Enter your name..">
            <label for="lname">EMAIL ADDRESS</label>
            <input type="text" id="lname" name="lastname" placeholder="Your email address..">
            <label for="lname">SUBJECT</label>
            <input type="text" id="lsubject" name="subject" placeholder="Enter subject...">

            <label for="subject">MESSAGE</label>
            <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
            <input type="submit" value="Submit">
          </form>
        </div>
      </div>
    </grid>
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
          <div class="btn-mail">Subscribe</div>
        </div>
      </div>
      <img class="imgsalad" src=".././images/salads.png" />
      <img class="imgsalad2" src=".././images/22.png" />
    </div>
  </article>


  <article class="article">
    <h1 class="title-grid-88">Check out the delicious recipe</h1>
    <div class="grid887">
     <?php grid4() ; ?>
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