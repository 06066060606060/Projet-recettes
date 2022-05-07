<?php
include './fonction.php';
session_start();
if (isset($_SESSION['id'])) {
  if ($_SESSION['id'] == '4') {
  } else {
    header("Location: ./index.php");
    die();
  }
}
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
    <a class="logo" href="./index.php"><img src=".././images/Foodieland.png" /></a>
    <div class="spacer"></div>
    <span> <a href="./index.php">Home</a></span>
    <span> <a href="./backend.php">Recipes List</a></span>
    <span> <a href="./categorie.php">Category List</a></span>
    <span><a href="./logout.php">Logout</a></span>
    <div></div>
  </div>

  <!----------------------------------------->
  <article class="article">
    <div class="table-responsive">
      <h2 class="title_liste">User List</h2>
      <table class="table table-hover table-bordered">
        <thead>
          <th>Username</th>
          <p>
            <th>Avatar</th>
          <p>
            <th>First Name</th>
          <p>
            <th>Last Name</th>
          <p>
            <th>Email</th>
            <p>
            <th>Role</th>
          <p>
            <th>Manage</th>
          <p>

        </thead>

        <tbody>
          <?php cruduser(); ?>
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