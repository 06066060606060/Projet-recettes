
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
    $idauteur = $_POST['id_auteur'];
    $idcat = $_POST['id_cat'];
    $preptime = $_POST['preptime'];
    $cooktime = $_POST['cooktime'];
    $image_recette = $_POST['image_recette'];
    $description = $_POST['description'];
    $categorie = 1;
    $type = 1;

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

    $calories = $_POST['calories'];
    $fat = $_POST['fat'];
    $prot = $_POST['prot'];
    $carbon = $_POST['carbon'];
    $chol = $_POST['chol'];

    $etape1 = $_POST['etape1'];
    $etape2 = $_POST['etape2'];
    $etape3 = $_POST['etape3'];



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
        $sql = "INSERT INTO recettes  VALUES (NULL, '" . $title . "', '" . $idauteur . "', '" . $idcat . "', '" . $preptime . "', '" . $cooktime . "', '" . $image_recette . "', '" . $description . "', '" . $categorie. "', '" . $type . "', '" . $image . "', NOW())";
        $q = $pdo->query($sql);

        $sql2 =  "INSERT INTO ingredient  VALUES (NULL, '" . $ing_plats1 . "', '" . $ing_plats2 . "', '" . $ing_plats3 . "', '" . $ing_plats4 . "', '" . $ing_plats5 . "', '" . $ing_plats6. "', '" . $ing_sauce1 . "', '" . $ing_sauce2 . "', '" . $ing_sauce3 . "', '" . $ing_sauce4 . "', '" . $ing_sauce5 . "', '" . $ing_sauce6 . "')";
        $q1 = $pdo->query($sql2);

        $sql3 =  "INSERT INTO etapes  VALUES (NULL, '" . $etape1 . "', '" . $etape2 . "', '" . $etape3 . "')";
        $q2 = $pdo->query($sql3);

        $sql4 = "INSERT INTO nutrition VALUES (NULL, '" . $calories . "', '" . $fat . "', '" . $prot . "', '" . $carbon . "', '" . $chol . "')";
        $q3 = $pdo->query($sql4);
    
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
    <span> <a href=".././index.php">Accueil</a></span>
    <span> <a href="./backend.php">Liste des recettes</a></span>
    <span> <a href="./categorie.php">Liste des Catégories</a></span>
    <span onclick=""><a href="./logout.php">Logout</a></span>
    <div></div>
  </div>

  <!----------------------------------------->
  <article class="article">
    <h2 class="title_add">Ajouter Une Recette</h2>
    <form action="./ajouter.php" method="post">
      <div class="grid_add">
        <div class="cook">
        <input type="text" id="hidden" name="id_recipes" placeholder="" hidden="true" value=""/>
          <input type="text" id="time" name="preptime" placeholder="Temps de preparation en minutes" value=""/>
        </div>
        <div class="cook">
        <input type="text" id="time2" name="cooktime" placeholder="temps de cuisson en minutes" value=""/>
      </div>
        <input type="text" name="id_auteur" placeholder="catégorie" value=""/>
        <input type="text" name="id_cat" placeholder="catégorie" value=""/>
        </div>
          <input type="text" class="titre-add" name="title" placeholder="title" value=""/>
          <input type="text" class="videourl" name="imgplayer" placeholder="Url de la vidéo..." value=""/>
          <textarea class="resume" name="description" placeholder="Resumé de la recette.."></textarea>

        <div class="grid2">
          <div class="gridingredient">
            <h2>Liste des Ingredients:</h2>
            <h2>Pour le plats:</h2>

            <input type="text" id="cingr" name="ing_plats1" placeholder="Ingredient 1..." value=""/>
            <input type="text" id="cingr" name="ing_plats2" placeholder="Ingredient 2..." value=""/>
            <input type="text" id="cingr" name="ing_plats3" placeholder="Ingredient 3..." value=""/>
            <input type="text" id="cingr" name="ing_plats4" placeholder="Ingredient 4..." value="" />
            <input type="text" id="cingr" name="ing_plats5" placeholder="Ingredient 5..." value="" />
            <input type="text" id="cingr" name="ing_plats6" placeholder="Ingredient 6..." value=""/>
            <h2>Pour la sauce:</h2>
            <input type="text" id="cingr" name="ing_sauce1" placeholder="Sauce 1..." value="" />
            <input type="text" id="cingr" name="ing_sauce2" placeholder="Sauce 2..." value="" />
            <input type="text" id="cingr" name="ing_sauce3" placeholder="Sauce 3..."  value=""/>
            <input type="text" id="cingr" name="ing_sauce4" placeholder="Sauce 4..."  value=""/>
            <input type="text" id="cingr" name="ing_sauce5" placeholder="Sauce 5..." value="" />
            <input type="text" id="cingr" name="ing_sauce6" placeholder="Sauce 6..." value="" />
            <h2>Infos Nutritionnelles:</h2>
            <input type="text" id="cingr" name="calories" placeholder="Calories..."  value=""/>
            <input type="text" id="cingr" name="fat" placeholder="Graisse..." value="" />
            <input type="text" id="cingr" name="prot" placeholder="Proteine..."  value=""/>
            <input type="text" id="cingr" name="carbon" placeholder="Glucide..."  value=""/>
            <input type="text" id="cingr" name="chol" placeholder="Cholesterol..." value="" />
          </div>
          <div class="gridetape">
            <h2>Liste des Etapes:</h2>
            <textarea class="resume" name="etape1" placeholder="Etapes 1.."></textarea>
            <input type="text" class="titre-add" name="image_recette" placeholder="title" value=""/>
            <div class="boutonimg">
              <label for="file" class="label-file">Choisir l'image</label>
              <img class="imgadd" style="width:auto;height:150px;" src="">
              <input id="file" class="input-file" type="file" />
            </div>

            <textarea class="resume" name="etape2" placeholder="Etapes 2.."></textarea>
            <textarea class="resume" name="etape3" placeholder="Etapes 3.."></textarea>
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