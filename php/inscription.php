<?php 
include './fonction.php';
include './bdd.php';
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
  <link rel="stylesheet" href=".././css/ajouter.css" />
  <link rel="stylesheet" href=".././css/navbar.css" />
  <link rel="stylesheet" href=".././css/style.css" />
</head>

<body>
  <div id="overlay"></div>
  <!-- BARRE DE MENU -->
  <div class="topnav">
  <?php topnav();?>
  </div>

  <!-- LOGIN -->
  <div id="login">
  <?php loginpop(); ?>
  </div>
  <!-- FIN LOGIN -->

  <!----------------------------------------->
  <article class="article">
  <?php 
  if (isset($_POST['username'])) {
    $target_dir = ".././images/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
      $uploadOk = 1;
      move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
    } else {
      $uploadOk = 0;
    }
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $requete = "INSERT INTO utilisateurs VALUES(NULL, '" . $_POST['username'] . "', '" . $password . "', '" . $target_file . "', '" . $_POST['Nom'] . "', '" . $_POST['Prenom'] . "', '" . $_POST['mail'] . "')";
  $resultat = $bdd->query($requete);
  $pdo = $bdd;
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sqlx = "SELECT * FROM `utilisateurs` ORDER BY `id` DESC LIMIT 1";
  $qx = $pdo->query($sqlx);
  foreach ($qx as $row) {
    $newid = $row['id'];
  }

  $sql2 =  "INSERT INTO `user_role` (`id_user`, `id_role`) VALUES ($newid, '3')";
  $q1 = $pdo->query($sql2);

  if ($resultat)
      echo "<span>Inscription Validée</span>";
  else
      echo "<p>Erreur</p>";
} ?>
    <h2 class="title_incription">Create an Account</h2>
    <form action="./inscription.php" method="post" enctype="multipart/form-data">

      <div class="griduser">
        <label for="username" class="label">Username:</label>
        <input type="text" id="cingr" name="username" placeholder="Username" />
        <label for="Nom" class="label">First Name:</label>
        <input type="text" id="cingr" name="Nom" placeholder="First Name" />
        <label for="Prenom" class="label">Last Name:</label>
        <input type="text" id="cingr" name="Prenom" placeholder="Last Name" />
        <label for="mail" class="label">Email:</label>
        <input type="text" id="cingr" name="mail" placeholder="Email" />
        <label for="Password" class="label">Password:</label>
        <input type="password" id="cingr" name="password" placeholder="password" />
        <label for="file" class="label-file">Select profile Picture</label>
        <input id="file" name="fileToUpload" class="input-file" type="file" name="avatar" />
        <div class="bouton">
          <input class="btn_add" type="submit" value="Register" />
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