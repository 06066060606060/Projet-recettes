
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

    $title = $_POST['title'];
    $image = $_POST['imgplayer'];
    $preptime = $_POST['preptime'];
    $cooktime = $_POST['cooktime'];
    $image_recette = $_POST['image_recette'];
    $description = $_POST['description'];
    $categorie = $_POST['categorie'];
    $type = $_POST['type'];




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
        $sql = "UPDATE recettes SET title = ?, imgplayer = ?, description = ? WHERE id_recipes = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($title, $image, $description, $id));
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



    $title = $data['title'];
    $image = $data['imgplayer'];
    $preptime = $data['preptime'];
    $cooktime = $data['cooktime'];
    $image_recette = $data['image_recette'];
    $description = $data['description'];
    $categorie = $data['categorie'];
    $image_recette = $data['image_recette'];

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

    $ing_plats1 = $data['ing_sauce1'];
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
    <form action="/modifier.php">
      <div class="grid_add">
        <div class="cook">
          <input type="text" id="time" name="preptime" placeholder="Temps de preparation en minutes" value="<?php echo !empty($preptime) ? $preptime : ''; ?>"/>
        </div>
        <div class="cook">
        <input type="text" id="time2" name="cooktime" placeholder="temps de cuisson en minutes" value="<?php echo !empty($cooktime) ? $cooktime : ''; ?>"/>
      </div>
          <select name="cat" id="cat">
            <option value="cat1">Catégorie</option>
            <option value="Poisson">Viandes</option>
            <option value="Poisson">Poisson</option>
            <option value="Legumes">Legumes</option>
          </select>
          <select name="cat2" id="cat2">
            <option value="Viande">Type</option>
            <option value="Viande">Plats Chaud</option>
            <option value="Poisson">Végétarien</option>
            <option value="Legumes">Entrée Froide</option>
          </select>
        </div>
          <input type="text" class="titre-add" name="title" placeholder="title" value="<?php echo !empty($title) ? $title : ''; ?>"/>
          <input type="text" class="videourl" name="imgplayer" placeholder="Url de la vidéo..." value="<?php echo !empty($image) ? $image : ''; ?>"/>
          <textarea class="resume" name="subject" placeholder="Resumé de la recette.."><?php echo !empty($description) ? $description : ''; ?></textarea>

        <div class="grid2">
          <div class="gridingredient">
            <h2>Liste des Ingredients:</h2>
            <h2>Pour le plats:</h2>
            <input type="text" id="cingr" name="prepa1" placeholder="Ingredient 1..." value="<?php echo !empty($ing_plats1) ? $ing_plats1 : ''; ?>"/>
            <input type="text" id="cingr" name="prepa2" placeholder="Ingredient 2..." value="<?php echo !empty($ing_plats2) ? $ing_plats2 : ''; ?>"/>
            <input type="text" id="cingr" name="prepa3" placeholder="Ingredient 3..." value="<?php echo !empty($ing_plats3) ? $ing_plats3 : ''; ?>"/>
            <input type="text" id="cingr" name="prepa4" placeholder="Ingredient 4..." value="<?php echo !empty($ing_plats4) ? $ing_plats4 : ''; ?>" />
            <input type="text" id="cingr" name="prepa5" placeholder="Ingredient 5..." value="<?php echo !empty($ing_plats5) ? $ing_plats5 : ''; ?>" />
            <input type="text" id="cingr" name="prepa6" placeholder="Ingredient 6..." value="<?php echo !empty($ing_plats6) ? $ing_plats6 : ''; ?>"/>
            <h2>Pour la sauce:</h2>
            <input type="text" id="cingr" name="prepas1" placeholder="Sauce 1..." value="<?php echo !empty($ing_sauce1) ? $ing_sauce1 : ''; ?>" />
            <input type="text" id="cingr" name="prepas2" placeholder="Sauce 2..." value="<?php echo !empty($ing_sauce2) ? $ing_sauce2 : ''; ?>" />
            <input type="text" id="cingr" name="prepas3" placeholder="Sauce 3..."  value="<?php echo !empty($ing_sauce3) ? $ing_sauce3 : ''; ?>"/>
            <input type="text" id="cingr" name="prepas4" placeholder="Sauce 4..."  value="<?php echo !empty($ing_sauce4) ? $ing_sauce4 : ''; ?>"/>
            <input type="text" id="cingr" name="prepas5" placeholder="Sauce 5..." value="<?php echo !empty($ing_sauce5) ? $ing_sauce5 : ''; ?>" />
            <input type="text" id="cingr" name="prepas6" placeholder="Sauce 6..." value="<?php echo !empty($ing_sauce6) ? $ing_sauce6 : ''; ?>" />
            <h2>Infos Nutritionnelles:</h2>
            <input type="text" id="cingr" name="nut1" placeholder="Calories..."  value="<?php echo !empty($calories) ? $calories : ''; ?>"/>
            <input type="text" id="cingr" name="nut2" placeholder="Graisse..." value="<?php echo !empty($fat) ? $fat : ''; ?>" />
            <input type="text" id="cingr" name="nut3" placeholder="Proteine..."  value="<?php echo !empty($prot) ? $prot : ''; ?>"/>
            <input type="text" id="cingr" name="nut4" placeholder="Glucide..."  value="<?php echo !empty($carbon) ? $carbon : ''; ?>"/>
            <input type="text" id="cingr" name="nut5" placeholder="Cholesterol..." value="<?php echo !empty($chol) ? $chol : ''; ?>" />
          </div>
          <div class="gridetape">
            <h2>Liste des Etapes:</h2>
            <textarea class="resume" name="subject" placeholder="Etapes 1.."><?php echo !empty($etape1) ? $etape1 : ''; ?></textarea>
            <div class="boutonimg">
              <label for="file" class="label-file">Choisir l'image</label>
              <img style="width:auto;height:150px;" src="<?php echo !empty($image_recette	) ? $image_recette : ''; ?>">
              <input id="file" class="input-file" type="file" />
            </div>
            <textarea class="resume" name="subject" placeholder="Etapes 2.."><?php echo !empty($etape2) ? $etape2 : ''; ?></textarea>
            <textarea class="resume" name="subject" placeholder="Etapes 3.."><?php echo !empty($etape3) ? $etape3 : ''; ?></textarea>
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