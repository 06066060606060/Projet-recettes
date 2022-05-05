
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
    $titleError = null;
    $timeError = null;
    $image_postError = null;
    $description_postError = null;
    $id = $_POST['id_recipes'];
    $title = $_POST['title'];
    $image = $_POST['imgplayer'];
    $preptime = $_POST['preptime'];
    $cooktime = $_POST['cooktime'];
    $image_recette = $_POST['image_recette'];
    $description = $_POST['description'];
    $categorie = $_POST['cat'];
    $type = $_POST['cat2'];

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
        $sql = "UPDATE recettes SET title = ?, imgplayer = ?, preptime = ?, cooktime = ?, image_recette = ?,  description = ?, categorie = ?, type = ? WHERE id_recipes = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($title, $image, $preptime, $cooktime, $image_recette, $description, $categorie, $type, $id));
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

        $bdd->connection = null;
        header("Location: ./backend.php");
    }
} else {

    $pdo = $bdd;
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM recettes Inner Join
    etapes On etapes.id_etapes = recettes.id_recipes Inner Join
    ingredients On ingredients.id_ingredient = recettes.id_recipes Inner Join
    nutrition On nutrition.id_nutrition = recettes.id_recipes where id_recipes = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $id_recipes = $data['id_recipes'];
    $title = $data['title'];
    $image = $data['imgplayer'];
    $preptime = $data['preptime'];
    $cooktime = $data['cooktime'];
    $image_recette = $data['image_recette'];
    $description = $data['description'];
    $categorie = $data['categorie'];
    $type = $data['type'];


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
    <span> <a href=".././index.php">Accueil</a></span>
    <span> <a href="./backend.php">Liste des recettes</a></span>
    <span> <a href="./categorie.php">Liste des Catégories</a></span>
    <span onclick=""><a href="./logout.php">Logout</a></span>
    <div></div>
  </div>

  <!----------------------------------------->
  <article class="article">
    <h2 class="title_add">Modifier Une Recette</h2>
    <form action="./modifier.php" method="post">
      <div class="grid_add">
        <div class="cook">
        <input type="text" id="hidden" name="id_recipes" placeholder="" hidden="true" value="<?= $id_recipes ?>"/>
          <input type="text" id="time" name="preptime" placeholder="Temps de preparation en minutes" value="<?= $preptime ?>"/>
        </div>
        <div class="cook">
        <input type="text" id="time2" name="cooktime" placeholder="temps de cuisson en minutes" value="<?= $cooktime ?>"/>
      </div>
        <input type="text" name="cat" placeholder="catégorie" value="<?= $categorie ?>"/>
        <input type="text" name="cat2" placeholder="catégorie" value="<?= $type ?>"/>
        </div>
          <input type="text" class="titre-add" name="title" placeholder="title" value="<?=  $title ?>"/>
          <input type="text" class="videourl" name="imgplayer" placeholder="Url de la vidéo..." value="<?= $image ?>"/>
          <textarea class="resume" name="description" placeholder="Resumé de la recette.."><?= $description ?></textarea>

        <div class="grid2">
          <div class="gridingredient">
            <h2>Liste des Ingredients:</h2>
            <h2>Pour le plats:</h2>

            <input type="text" id="cingr" name="ing_plats1" placeholder="Ingredient 1..." value="<?= $ing_plats1?>"/>
            <input type="text" id="cingr" name="ing_plats2" placeholder="Ingredient 2..." value="<?= $ing_plats2 ?>"/>
            <input type="text" id="cingr" name="ing_plats3" placeholder="Ingredient 3..." value="<?= $ing_plats3 ?>"/>
            <input type="text" id="cingr" name="ing_plats4" placeholder="Ingredient 4..." value="<?= $ing_plats4 ?>" />
            <input type="text" id="cingr" name="ing_plats5" placeholder="Ingredient 5..." value="<?= $ing_plats5 ?>" />
            <input type="text" id="cingr" name="ing_plats6" placeholder="Ingredient 6..." value="<?= $ing_plats6 ?>"/>
            <h2>Pour la sauce:</h2>
            <input type="text" id="cingr" name="ing_sauce1" placeholder="Sauce 1..." value="<?= $ing_sauce1 ?>" />
            <input type="text" id="cingr" name="ing_sauce2" placeholder="Sauce 2..." value="<?= $ing_sauce2 ?>" />
            <input type="text" id="cingr" name="ing_sauce3" placeholder="Sauce 3..."  value="<?= $ing_sauce3 ?>"/>
            <input type="text" id="cingr" name="ing_sauce4" placeholder="Sauce 4..."  value="<?= $ing_sauce4 ?>"/>
            <input type="text" id="cingr" name="ing_sauce5" placeholder="Sauce 5..." value="<?= $ing_sauce5 ?>" />
            <input type="text" id="cingr" name="ing_sauce6" placeholder="Sauce 6..." value="<?= $ing_sauce6 ?>" />
            <h2>Infos Nutritionnelles:</h2>
            <input type="text" id="cingr" name="calories" placeholder="Calories..."  value="<?= $calories ?>"/>
            <input type="text" id="cingr" name="fat" placeholder="Graisse..." value="<?= $fat ?>" />
            <input type="text" id="cingr" name="prot" placeholder="Proteine..."  value="<?= $prot ?>"/>
            <input type="text" id="cingr" name="carbon" placeholder="Glucide..."  value="<?= $carbon ?>"/>
            <input type="text" id="cingr" name="chol" placeholder="Cholesterol..." value="<?= $chol ?>" />
          </div>
          <div class="gridetape">
            <h2>Liste des Etapes:</h2>
            <textarea class="resume" name="etape1" placeholder="Etapes 1.."><?= $etape1 ?></textarea>
            <input type="text" class="titre-add" name="image_recette" placeholder="title" value="<?=  $image_recette ?>"/>
            <div class="boutonimg">
              <label for="file" class="label-file">Choisir l'image</label>
              <img class="imgadd" style="width:auto;height:150px;" src="<?= $image_recette ?>">
              <input id="file" class="input-file" type="file" />
            </div>

            <textarea class="resume" name="etape2" placeholder="Etapes 2.."><?= $etape2 ?></textarea>
            <textarea class="resume" name="etape3" placeholder="Etapes 3.."><?= $etape3 ?></textarea>
          </div>
          <div class="bouton">
            <input class="btn_add" type="submit" value="Publier la modification de la recette" />
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