<?php
include './bdd.php';
include './fonction.php';
session_start();
if (isset($_SESSION['id'])) {
} else {
  header("Location: ./index.php");
  die();
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
  <link rel="stylesheet" href=".././css/ajouter.css" />
</head>

<body>

  <?php
  $id = null;
  if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
  }

  // Check if image file is a actual image or fake image
  if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) { // on initialise nos erreurs
    if (isset($_FILES['fileToUpload']) and !empty($_FILES['fileToUpload']['name'])) {
      $target_dir = "../images/";
      $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if ($check !== false) {
        $uploadOk = 1;
        $image_recette = $target_file;
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
      } else {
        $uploadOk = 0;
        $image_recette = "";
      }
    } else {
      $image_recette = "";
    }
   
    $titleError = null;
    $timeError = null;
    $imgplayer_postError = null;
    $description_postError = null;
    $id =  htmlspecialchars($_POST['id_recipes']);
    $title = htmlspecialchars($_POST['title']);
    $imgplayer = htmlspecialchars($_POST['imgplayer']);
    $idauteur = $_SESSION['id'];
    $catname = htmlspecialchars($_POST['name']);
    $preptime = htmlspecialchars($_POST['preptime']);
    $cooktime = htmlspecialchars($_POST['cooktime']);
    $image_recette = $target_file;
    $description = htmlspecialchars($_POST['description']);
    $type = htmlspecialchars($_POST['type']);
    $vedette = htmlspecialchars($_POST['vedette']);
    $ing_plats1 = htmlspecialchars($_POST['ing_plats1']);
    $ing_plats2 = htmlspecialchars($_POST['ing_plats2']);
    $ing_plats3 = htmlspecialchars($_POST['ing_plats3']);
    $ing_plats4 = htmlspecialchars($_POST['ing_plats4']);
    $ing_plats5 = htmlspecialchars($_POST['ing_plats5']);
    $ing_plats6 = htmlspecialchars($_POST['ing_plats6']);
    $ing_sauce1 = htmlspecialchars($_POST['ing_sauce1']);
    $ing_sauce2 = htmlspecialchars($_POST['ing_sauce2']);
    $ing_sauce3 = htmlspecialchars($_POST['ing_sauce3']);
    $ing_sauce4 = htmlspecialchars($_POST['ing_sauce4']);
    $ing_sauce5 = htmlspecialchars($_POST['ing_sauce5']);
    $ing_sauce6 = htmlspecialchars($_POST['ing_sauce6']);
    $calories = htmlspecialchars($_POST['calories']);
    $fat = htmlspecialchars($_POST['fat']);
    $prot = htmlspecialchars($_POST['prot']);
    $carbon = htmlspecialchars($_POST['carbon']);
    $chol = htmlspecialchars($_POST['chol']);
    $etape1 = htmlspecialchars($_POST['etape1']);
    $etape2 = htmlspecialchars($_POST['etape2']);
    $etape3 = htmlspecialchars($_POST['etape3']);

    $valid = true;
    if (empty($title)) {
      $titleError = 'Entrer un titre';
      $valid = false;
    }
    if (empty($description)) {
      $description_postError = 'Entrer un description';
      $valid = false;
    }

    if ($valid) {
      $pdo = $bdd;
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "INSERT INTO recettes (`id_recipes`, `title`, `id_auteur`, `preptime`, `cooktime`, `image_recette`, `description`, `type`, `date`, `imgplayer`, `vedette`)  VALUES (NULL, '" . $title . "', '" . $idauteur . "', '" . $preptime . "', '" . $cooktime . "', '" . $image_recette . "', '" . $description . "', '" . $type . "', NOW() , '" . $imgplayer . "','" . $vedette . "')";
      $q = $pdo->query($sql);
      $sqlx = "SELECT `id_recipes` FROM `recettes` ORDER BY `id_recipes` DESC LIMIT 1";
      $qx = $pdo->query($sqlx);
      foreach ($qx as $row) {
        $newrecepies = $row['id_recipes'];
      }
      $sql2 =  "INSERT INTO ingredients (`id_ingredient`, `ing_plats1`, `ing_plats2`, `ing_plats3`, `ing_plats4`, `ing_plats5`, `ing_plats6`, `ing_sauce1`, `ing_sauce2`, `ing_sauce3`, `ing_sauce4`, `ing_sauce5`, `ing_sauce6`)  VALUES ($newrecepies, '" . $ing_plats1 . "', '" . $ing_plats2 . "', '" . $ing_plats3 . "', '" . $ing_plats4 . "', '" . $ing_plats5 . "', '" . $ing_plats6 . "', '" . $ing_sauce1 . "', '" . $ing_sauce2 . "', '" . $ing_sauce3 . "', '" . $ing_sauce4 . "', '" . $ing_sauce5 . "', '" . $ing_sauce6 . "')";
      $q1 = $pdo->query($sql2);
      $sql3 =  "INSERT INTO etapes (`id`, `id_etapes`, `etape1`, `etape2`, `etape3`) VALUES (NULL, $newrecepies, '" . $etape1 . "', '" . $etape2 . "', '" . $etape3 . "')";
      $q2 = $pdo->query($sql3);
      $sql4 = "INSERT INTO nutrition (`id_nutrition`, `id_nut`, `calories`, `fat`, `prot`, `carbon`, `chol`) VALUES ($newrecepies, $newrecepies, '" . $calories . "', '" . $fat . "', '" . $prot . "', '" . $carbon . "', '" . $chol . "')";
      $q3 = $pdo->query($sql4);
      $sql5 = "INSERT INTO link_cat (`id_categorie`, `id_recette`) VALUES ($catname, $newrecepies)";
      $q4 = $pdo->query($sql5);

      $bdd->connection = null;
      header("Location: ./backend.php");
    }
  } else {

    $bdd->connection = null;
  }

  ?>

  <div id="overlay"></div>
  <!-- BARRE DE MENU -->
  <div class="topnav">
    <a class="logo" href="#"><img src=".././images/Foodieland.png" /></a>
    <div class="spacer"></div>
    <span> <a href="./index.php">Home</a></span>
    <span> <a href="./backend.php">Recipes List</a></span>
    <span> <a href="./categorie.php">Category List</a></span>
    <span onclick=""><a href="./logout.php">Logout</a></span>
    <div></div>
  </div>

  <!----------------------------------------->
  <article class="article">
    <h2 class="title_add">Add new recipes</h2>
    <form action="./ajouter.php" method="post" enctype="multipart/form-data">
      <div class="grid_add">
        <div class="cook">
          <input type="text" id="hidden" name="id_recipes" placeholder="" hidden="true" value="<?= $id_recipes ?>" />
          <label for="preptime" class="label-preptime">Preparation Time:</label>
          <select name="preptime" id="time">
            <option value="5 Minutes">5 Minutes</option>
            <option value="10 Minutes">10 Minutes</option>
            <option value="15 Minutes">15 Minutes</option>
            <option value="20 Minutes">20 Minutes</option>
            <option value="25 Minutes">25 Minutes</option>
            <option value="30 Minutes">30 Minutes</option>
            <option value="40 Minutes">40 Minutes</option>
            <option value="50 Minutes">50 Minutes</option>
            <option value="60 Minutes">60 Minutes</option>
            <option value="70 Minutes">70 Minutes</option>
            <option value="80 Minutes">80 Minutes</option>
            <option value="90 Minutes">90 Minutes</option>
          </select>
        </div>
        <div class="cook">
          <label for="cooktime" class="label-cooktime">Cook Time:</label>
          <select name="cooktime" id="time">
            <option value="5 Minutes">5 Minutes</option>
            <option value="10 Minutes">10 Minutes</option>
            <option value="15 Minutes">15 Minutes</option>
            <option value="20 Minutes">20 Minutes</option>
            <option value="25 Minutes">25 Minutes</option>
            <option value="30 Minutes">30 Minutes</option>
            <option value="40 Minutes">40 Minutes</option>
            <option value="50 Minutes">50 Minutes</option>
            <option value="60 Minutes">60 Minutes</option>
            <option value="70 Minutes">70 Minutes</option>
            <option value="80 Minutes">80 Minutes</option>
            <option value="90 Minutes">90 Minutes</option>
          </select>
        </div>
        <div class="cook">
          <label for="name" class="label-name">Category:</label>
          <select name="name" id="name">
            <option value="1">Breakfast</option>
            <option value="2">Vegan</option>
            <option value="3">Meat</option>
            <option value="4">Dessert</option>
            <option value="5">Lunch</option>
            <option value="6">Chocolat</option>
          </select>
        </div>
        <div class="cook">
          <label for="type" class="label-type">Type:</label>
          <select name="type" id="type">
            <option value="Healthy">Healthy</option>
            <option value="Hot Recipes">Hot Recipes</option>
            <option value="SeaFood">SeaFood</option>
            <option value="Sweet">Sweet</option>
          </select>
        </div>
        <div class="cook">
          <?php if (isset($_SESSION['id'])) {
            if ($_SESSION['id'] == '4') {
              echo '<label for="vedette" class="label-vedette">In Front:</label>
      <select name="vedette" id="vedette">
      <option value="1">Activate</option>
      <option value="0">Desactivate</option>
    </select>';
            }
          } ?>
        </div>
      </div>
      <input type="text" class="titre-add" name="title" placeholder="title" value="" />
      <input type="text" class="videourl" name="imgplayer" placeholder="video URL..." value="" />
      <textarea class="resume" name="description" placeholder="Recipes resume.."></textarea>

      <div class="grid2">
        <div class="gridingredient">
          <h2>Ingredients:</h2>
          <h2>For main dish:</h2>

          <input type="text" id="cingr" name="ing_plats1" placeholder="Ingredient 1..." value="" />
          <input type="text" id="cingr" name="ing_plats2" placeholder="Ingredient 2..." value="" />
          <input type="text" id="cingr" name="ing_plats3" placeholder="Ingredient 3..." value="" />
          <input type="text" id="cingr" name="ing_plats4" placeholder="Ingredient 4..." value="" />
          <input type="text" id="cingr" name="ing_plats5" placeholder="Ingredient 5..." value="" />
          <input type="text" id="cingr" name="ing_plats6" placeholder="Ingredient 6..." value="" />
          <h2>For the sauce:</h2>
          <input type="text" id="cingr" name="ing_sauce1" placeholder="Sauce 1..." value="" />
          <input type="text" id="cingr" name="ing_sauce2" placeholder="Sauce 2..." value="" />
          <input type="text" id="cingr" name="ing_sauce3" placeholder="Sauce 3..." value="" />
          <input type="text" id="cingr" name="ing_sauce4" placeholder="Sauce 4..." value="" />
          <input type="text" id="cingr" name="ing_sauce5" placeholder="Sauce 5..." value="" />
          <input type="text" id="cingr" name="ing_sauce6" placeholder="Sauce 6..." value="" />
          <h2>Nutrition Information for 100g:</h2>

          <label for="calories" class="label-calories">Calories kcal:</label>
          <input type="text" id="cingr" name="calories" placeholder="Calories kcal..." value="" />
          <label for="fat" class="label-calories">Total fat g:</label>
          <input type="text" id="cingr" name="fat" placeholder="Total fat g..." value="" />
          <label for="prot" class="label-calories">Protein g:</label>
          <input type="text" id="cingr" name="prot" placeholder="Protein g..." value="" />
          <label for="carbon" class="label-calories">Carbohydrate g:</label>
          <input type="text" id="cingr" name="carbon" placeholder="Carbohydrate g..." value="" />
          <label for="chol" class="label-calories">Cholesterol mg:</label>
          <input type="text" id="cingr" name="chol" placeholder="Cholesterol mg..." value="" />
          <input class="btn_add" type="submit" value="Publish new recepies" />
        </div>
        <div class="gridetape">
          <h2>Directions:</h2>
          <label for="etape1" class="label-etape1">Step1:</label>
          <textarea class="resume" name="etape1" placeholder="Step 1.."></textarea>
          <div class="boutonimg">
            <label for="file" class="label-file">Add picture</label>
            <img class="imgadd" style="width:auto;height:150px;" src="">
            <input id="file" name="fileToUpload" class="input-file" type="file" />
          </div>
          <label for="etape2" class="label-etape2">Step2:</label>
          <textarea class="resume" name="etape2" placeholder="Step 2.."></textarea>
          <label for="etape" class="label-etape3">Step3:</label>
          <textarea class="resume" name="etape3" placeholder="Step 3.."></textarea>
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