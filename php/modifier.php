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
    $image_recette = $_POST['links'];
  }

    $titleError = null;
    $timeError = null;
    $image_postError = null;
    $description_postError = null;
    $id = $_POST['id_recipes'];
    $title = $_POST['title'];
    $image = $_POST['imgplayer'];
    $preptime = $_POST['preptime'];
    $cooktime = $_POST['cooktime'];
    $description = $_POST['description'];
    $categorie = $_POST['name'];
    $type = $_POST['type'];
    $vedette = $_POST['vedette'];
    $ing_plats1 = $_POST['ing_plats1'];
    $ing_plats2 = $_POST['ing_plats2'];
    $ing_plats3 = $_POST['ing_plats3'];
    $ing_plats4 = $_POST['ing_plats4'];
    $ing_plats5 = $_POST['ing_plats5'];
    $ing_plats6 = $_POST['ing_plats6'];

    $ing_sauce1 = $_POST['ing_sauce1'];
    $ing_sauce2 = $_POST['ing_sauce2'];
    $ing_sauce3 = $_POST['ing_sauce3'];
    $ing_sauce4 = $_POST['ing_sauce4'];
    $ing_sauce5 = $_POST['ing_sauce5'];
    $ing_sauce6 = $_POST['ing_sauce6'];

    $etape1 = $_POST['etape1'];
    $etape2 = $_POST['etape2'];
    $etape3 = $_POST['etape3'];

    $calories = $_POST['calories'];
    $fat = $_POST['fat'];
    $prot = $_POST['prot'];
    $carbon = $_POST['carbon'];
    $chol = $_POST['chol'];

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
      $sql = "UPDATE recettes SET title = ?, imgplayer = ?, preptime = ?, cooktime = ?, image_recette = ?,  description = ?, type = ? , vedette = ? WHERE id_recipes = ?";
      $q = $pdo->prepare($sql);
      $q->execute(array($title, $image, $preptime, $cooktime, $image_recette, $description, $type, $vedette, $id));
      $thisrecipes = $id;
      $sql2 = "UPDATE ingredients SET ing_plats1 = ?, ing_plats2 = ?, ing_plats3 = ?, ing_plats4 = ?, ing_plats5 = ?,  ing_plats6 = ? WHERE id_ingredient = $thisrecipes";
      $q1 = $pdo->prepare($sql2);
      $q1->execute(array($ing_plats1, $ing_plats2, $ing_plats3, $ing_plats4, $ing_plats5, $ing_plats6));

      $sql3 = "UPDATE ingredients SET ing_sauce1 = ?, ing_sauce2 = ?, ing_sauce3 = ?, ing_sauce4 = ?, ing_sauce5 = ?,  ing_sauce6 = ? WHERE id_ingredient = $thisrecipes";
      $q2 = $pdo->prepare($sql3);
      $q2->execute(array($ing_sauce1, $ing_sauce2, $ing_sauce3, $ing_sauce4, $ing_sauce5, $ing_sauce6));

      $sql4 = "UPDATE nutrition SET calories = ?, fat = ?, prot = ?, carbon = ?, chol = ? WHERE id_nutrition = $thisrecipes";
      $q3 = $pdo->prepare($sql4);
      $q3->execute(array($calories, $fat, $prot, $carbon, $chol));

      $sql5 = "UPDATE etapes SET etape1 = ?, etape2 = ?, etape3 = ? WHERE id_etapes = $thisrecipes";
      $q4 = $pdo->prepare($sql5);
      $q4->execute(array($etape1, $etape2, $etape3));

      $sql6 = "UPDATE `link_cat` SET `id_categorie` = ? WHERE id_recette = $thisrecipes";
      $q5 = $pdo->prepare($sql6);
      $q5->execute(array($categorie));

      $bdd->connection = null;
      header("Location: ./backend.php");
    }
  } else {

    $pdo = $bdd;
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM recettes 
    Inner Join etapes On etapes.id_etapes = recettes.id_recipes 
    Inner Join ingredients On ingredients.id_ingredient = recettes.id_recipes 
    Inner Join link_cat On  link_cat.id_recette = recettes.id_recipes
    INNER JOIN categories ON link_cat.id_categorie = categories.id_cat
    Inner Join nutrition On nutrition.id_nutrition = recettes.id_recipes where id_recipes = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $id_recipes = $data['id_recipes'];
    $title = $data['title'];
    $image = $data['imgplayer'];
    $preptime = $data['preptime'];
    $cooktime = $data['cooktime'];
    $image_recette = $data['image_recette'];
    $image_link= $data['image_recette'];
    $description = $data['description'];
    $type = $data['type'];
    $categorie = $data['id_cat'];
    $vedette = $data['vedette'];
    $etape1 = $data['etape1'];
    $etape2 = $data['etape2'];
    $etape3 = $data['etape3'];

    $ing_plats1 = $data['ing_plats1'];
    $ing_plats2 = $data['ing_plats2'];
    $ing_plats3 = $data['ing_plats3'];
    $ing_plats4 = $data['ing_plats4'];
    $ing_plats5 = $data['ing_plats5'];
    $ing_plats6 = $data['ing_plats6'];

    $ing_sauce1 = $data['ing_sauce1'];
    $ing_sauce2 = $data['ing_sauce2'];
    $ing_sauce3 = $data['ing_sauce3'];
    $ing_sauce4 = $data['ing_sauce4'];
    $ing_sauce5 = $data['ing_sauce5'];
    $ing_sauce6 = $data['ing_sauce6'];

    $calories = $data['calories'];
    $fat = $data['fat'];
    $prot = $data['prot'];
    $carbon = $data['carbon'];
    $chol = $data['chol'];

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
    <h2 class="title_add">Edit Recipe</h2>
    <form action="./modifier.php" method="post" enctype="multipart/form-data">
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
      <input type="text" class="titre-add" name="title" placeholder="title" value="<?= $title ?>" />
      <input type="text" class="videourl" name="imgplayer" placeholder="video url..." value="<?= $image ?>" />
      <textarea class="resume" name="description" placeholder="Recipes resume.."><?= $description ?></textarea>

      <div class="grid2">
        <div class="gridingredient">
          <h2>Ingredients:</h2>
          <h2>For main dish:</h2>

          <input type="text" id="cingr" name="ing_plats1" placeholder="Ingredient 1..." value="<?= $ing_plats1 ?>" />
          <input type="text" id="cingr" name="ing_plats2" placeholder="Ingredient 2..." value="<?= $ing_plats2 ?>" />
          <input type="text" id="cingr" name="ing_plats3" placeholder="Ingredient 3..." value="<?= $ing_plats3 ?>" />
          <input type="text" id="cingr" name="ing_plats4" placeholder="Ingredient 4..." value="<?= $ing_plats4 ?>" />
          <input type="text" id="cingr" name="ing_plats5" placeholder="Ingredient 5..." value="<?= $ing_plats5 ?>" />
          <input type="text" id="cingr" name="ing_plats6" placeholder="Ingredient 6..." value="<?= $ing_plats6 ?>" />
          <h2>For the sauce:</h2>
          <input type="text" id="cingr" name="ing_sauce1" placeholder="Sauce 1..." value="<?= $ing_sauce1 ?>" />
          <input type="text" id="cingr" name="ing_sauce2" placeholder="Sauce 2..." value="<?= $ing_sauce2 ?>" />
          <input type="text" id="cingr" name="ing_sauce3" placeholder="Sauce 3..." value="<?= $ing_sauce3 ?>" />
          <input type="text" id="cingr" name="ing_sauce4" placeholder="Sauce 4..." value="<?= $ing_sauce4 ?>" />
          <input type="text" id="cingr" name="ing_sauce5" placeholder="Sauce 5..." value="<?= $ing_sauce5 ?>" />
          <input type="text" id="cingr" name="ing_sauce6" placeholder="Sauce 6..." value="<?= $ing_sauce6 ?>" />
          <h2>Nutrition Informations:</h2>
          <label for="calories" class="label-calories">Calories kcal:</label>
          <input type="text" id="cingr" name="calories" placeholder="Calories kcal..." value="<?= $calories ?>" />
          <label for="fat" class="label-calories">Total fat g:</label>
          <input type="text" id="cingr" name="fat" placeholder="Graisse g..." value="<?= $fat ?>" />
          <label for="prot" class="label-calories">Protein g:</label>
          <input type="text" id="cingr" name="prot" placeholder="Proteine g..." value="<?= $prot ?>" />
          <label for="carbon" class="label-calories">Carbohydrate g:</label>
          <input type="text" id="cingr" name="carbon" placeholder="Carbohydrate g..." value="<?= $carbon ?>" />
          <label for="chol" class="label-calories">Cholesterol mg:</label>
          <input type="text" id="cingr" name="chol" placeholder="Cholesterol mg..." value="<?= $calories ?>" />
          <input class="btn_add" type="submit" value="Publish edited Recipes" />
        </div>
        <div class="gridetape">
          <h2>Directions:</h2>
          <label for="etape1" class="label-etape1">Step1:</label>
          <textarea class="resume" name="etape1" placeholder="Step1 .."><?= $etape1 ?></textarea>
          <div class="boutonimg">
            <label for="file" class="label-file">select picture</label>
            <input id="file" name="fileToUpload" class="input-file" type="file" />
          </div>
          <input type="hidden" id="cingr" name="links" value="<?= $image_link ?>" />
          <img class="imgadd" style="width:auto;height:150px;" src="<?= $image_recette ?>"><br>
          <label for="etape2" class="label-etape2">Step2:</label>
          <textarea class="resume" name="etape2" placeholder="Step2.."><?= $etape2 ?></textarea>
          <label for="etape3" class="label-etape3">Step3:</label>
          <textarea class="resume" name="etape3" placeholder="Step3.."><?= $etape3 ?></textarea>
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