<?php

//AFFICHAGE 'D'UNE RECETTE'_____________________________
function topnav()
{
  if (isset($_SESSION['id'])){
      echo '
      <a class="logo" href="./index.php"><img src=".././images/Foodieland.png" /></a>
      <div class="spacer"></div>
      <span> <a href="./index.php">Accueil</a></span>
      <span> <a href="./recette.php">Recettes</a></span>
      <span><a href="./contact.php">Contact</a></span>
      <span><a href="./backend.php">Mes Recettes</a></span>
      <span><a href="./logout.php">Logout</a></span>
      <div></div>
      <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
      <a href="#"><i class="fa-brands fa-twitter"></i></a>
      <a href="#"><i class="fa-brands fa-instagram"></i></a>';
    } else {
      echo '
      <a class="logo" href="./index.php"><img src=".././images/Foodieland.png" /></a>
      <div class="spacer"></div>
      <span> <a href="./index.php">Accueil</a></span>
      <span> <a href="./recette.php">Recettes</a></span>
      <span><a href="./contact.php">Contact</a></span>
      <span><a href="./inscription.php">Inscription</a></span>
      <span onclick="on()"><a href="#">Login</a></span>
      <div></div>
      <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
      <a href="#"><i class="fa-brands fa-twitter"></i></a>
      <a href="#"><i class="fa-brands fa-instagram"></i></a>';
}
}
// ___________________________________________________________________________________________

function gridtop()
{

  include './bdd.php';
  $postx = $bdd->query('SELECT
    recettes.title,
    recettes.preptime,
    recettes.image_recette,
    recettes.description,
    recettes.categorie,
    recettes.type,
    recettes.date,
    recettes.id_recipes,
    utilisateurs.nom,
    utilisateurs.prenom,
    recettes.id_auteur,
    utilisateurs.id,
    utilisateurs.avatar
FROM
  recettes
  INNER JOIN utilisateurs ON recettes.id_auteur = utilisateurs.id
   ORDER BY RAND() limit 1');

  while ($post = $postx->fetch()) {
    $tabcontent[] = [
      'id_recipes' => $post['id_recipes'],
      'title' => $post['title'],
      'preptime' => $post['preptime'],
      'image_recette' => $post['image_recette'],
      'description' => $post['description'],
      'categorie' => $post['categorie'],
      'type' => $post['type'],
      'date' => $post['date'],
      'nom' => $post['nom'],
      'prenom' => $post['prenom'],
      'id_auteur' => $post['id_auteur'],
      'avatar' => $post['avatar'],

    ];
    $date = date_create($post['date']);
  }

  for ($i = 0; $i < count($tabcontent); $i++) { ?>


    <grid class="gridtop">
      <!-- grid cell gauche -->
      <itemsG>
        <img class="topblue" src=".././images/Rectangle1.png" />
        <div class="divicon">
          <img class="circle" src=".././images/Badge.png" />

          <p class="icone1">
            <img class="icon-img" src=".././images/<?= $tabcontent[$i]["type"]; ?>.png" />
            <span class="cat-n"><?= $tabcontent[$i]["type"]; ?></span>
          </p>
        </div>
        <div class="divtext">
          <h1 class="titre-recette"><?= $tabcontent[$i]["title"]; ?></h1>
          <p class="text-home">
            <?= $tabcontent[$i]["description"]; ?></h1>
          </p>
        </div>
        <div class="boutton-time">
          <i class="fa-solid fa-stopwatch"></i>
          <span class="timer"><?= $tabcontent[$i]["preptime"]; ?></span>
        </div>

        <div class="boutton-fork">
          <i class="fa-solid fa-utensils"></i>
          <span class="cat-0"><?= $tabcontent[$i]["categorie"]; ?></span>
        </div>

        <div class="divautor">
          <p class="imga"><img class="imgavatar" src="<?= $tabcontent[$i]["avatar"]; ?>" /></p>
          <div class="divname">
            <p class="nameautor"><?= $tabcontent[$i]["prenom"]; ?> &zwnj; &zwnj;<?= $tabcontent[$i]["nom"]; ?></p>
            <p class="date_autor"><?= date_format($date, 'd F Y'); ?></p>
          </div>
        </div>

        <div class="view_button">
          <span class="btn-title"><a class="link" href="./recette.php?id=<?= $tabcontent[$i]["id_recipes"]; ?>">View Recipes</a></span>
          <i class="fa-solid fa-circle-play"></i>
        </div>
      </itemsG>

      <!-- grid cell droite -->
      <itemsD>
        <img class="topdroite" src="<?= $tabcontent[$i]["image_recette"]; ?>" />
      </itemsD>
    </grid>
  <?php
    $bdd->connection = null;
  } ?>

  <?php
}

// _____________________________________________________________________________________________

function grid9()
{

  include './bdd.php';
  $postx = $bdd->query('SELECT
    recettes.title,
    recettes.preptime,
    recettes.image_recette,
    recettes.description,
    recettes.categorie,
    recettes.type,
    recettes.date,
    recettes.id_recipes,
    utilisateurs.nom,
    utilisateurs.prenom,
    recettes.id_auteur,
    utilisateurs.id,
    utilisateurs.avatar
FROM
  recettes
  INNER JOIN utilisateurs ON recettes.id_auteur = utilisateurs.id
   ORDER BY RAND() limit 9');

  while ($post = $postx->fetch()) {
    $tabcontent[] = [
      'id_recipes' => $post['id_recipes'],
      'title' => $post['title'],
      'preptime' => $post['preptime'],
      'image_recette' => $post['image_recette'],
      'description' => $post['description'],
      'categorie' => $post['categorie'],
      'type' => $post['type'],

    ];
    $date = date_create($post['date']);
  }

  for ($i = 0; $i < count($tabcontent); $i++) { ?>

    <div class="cell">
      <div class="dotlike"><i class="flike fa-solid fa-heart" onclick="this.style.color='red'"></i></div>
      <a class="link" href="./recette.php?id=<?= $tabcontent[$i]["id_recipes"]; ?>"><img class="img9" src="<?= $tabcontent[$i]["image_recette"]; ?>" /></a>
      <p class="recette9-title"><?= $tabcontent[$i]["title"]; ?></p>
      <div class="boutton-timeCell">
        <i class="iconT fa-solid fa-stopwatch"></i>
        <span class="timercell"><?= $tabcontent[$i]["preptime"]; ?></span>
      </div>
      <div class="boutton-catCell">
        <i class="iconC fa-solid fa-utensils"></i>
        <span class="Catcell"><?= $tabcontent[$i]["type"]; ?></span>
      </div>
    </div>

  <?php
    $bdd->connection = null;
  } ?>

  <?php
}

// _____________________________________________________________________________________________

function grid8()
{

  include './bdd.php';
  $postx = $bdd->query('SELECT
    recettes.title,
    recettes.preptime,
    recettes.image_recette,
    recettes.description,
    recettes.categorie,
    recettes.type,
    recettes.date,
    recettes.id_recipes,
    utilisateurs.nom,
    utilisateurs.prenom,
    recettes.id_auteur,
    utilisateurs.id,
    utilisateurs.avatar
FROM
  recettes
  INNER JOIN utilisateurs ON recettes.id_auteur = utilisateurs.id
   ORDER BY RAND() limit 8');

  while ($post = $postx->fetch()) {
    $tabcontent[] = [
      'id_recipes' => $post['id_recipes'],
      'title' => $post['title'],
      'preptime' => $post['preptime'],
      'image_recette' => $post['image_recette'],
      'description' => $post['description'],
      'categorie' => $post['categorie'],
      'type' => $post['type'],

    ];
    $date = date_create($post['date']);
  }

  for ($i = 0; $i < count($tabcontent); $i++) { ?>

    <div class="cell8">
      <div class="dotlike8"><i class="flike8 fa-solid fa-heart" onclick="this.style.color='red'"></i></div>
      <a class="link" href="./recette.php?id=<?= $tabcontent[$i]["id_recipes"]; ?>"> <img class="img98" src="<?= $tabcontent[$i]["image_recette"]; ?>" /></a>
      <p class="recette8-title"><?= $tabcontent[$i]["title"]; ?></p>
      <div class="boutton-timeCell8">
        <i class="iconT8 fa-solid fa-stopwatch"></i>
        <span class="timercell"><?= $tabcontent[$i]["preptime"]; ?></span>
      </div>
      <div class="boutton-catCell8">
        <i class="iconC8 fa-solid fa-utensils"></i>
        <span class="catCell8"><?= $tabcontent[$i]["type"]; ?></span>
      </div>
    </div>


  <?php
    $bdd->connection = null;
  } ?>

  <?php
}


// _____________________________________________________________________________________________

function grid4()
{

  include './bdd.php';
  $postx = $bdd->query('SELECT
    recettes.title,
    recettes.preptime,
    recettes.image_recette,
    recettes.description,
    recettes.categorie,
    recettes.type,
    recettes.date,
    recettes.id_recipes,
    utilisateurs.nom,
    utilisateurs.prenom,
    recettes.id_auteur,
    utilisateurs.id,
    utilisateurs.avatar
FROM
  recettes
  INNER JOIN utilisateurs ON recettes.id_auteur = utilisateurs.id
   ORDER BY RAND() limit 4');

  while ($post = $postx->fetch()) {
    $tabcontent[] = [
      'id_recipes' => $post['id_recipes'],
      'title' => $post['title'],
      'preptime' => $post['preptime'],
      'image_recette' => $post['image_recette'],
      'description' => $post['description'],
      'categorie' => $post['categorie'],
      'type' => $post['type'],

    ];
    $date = date_create($post['date']);
  }

  for ($i = 0; $i < count($tabcontent); $i++) { ?>

    <div class="cell8">
      <div class="dotlike8"><i class="flike8 fa-solid fa-heart" onclick="this.style.color='red'"></i></div>
      <a class="link" href="./recette.php?id=<?= $tabcontent[$i]["id_recipes"]; ?>"> <img class="img98" src="<?= $tabcontent[$i]["image_recette"]; ?>" /></a>
      <p class="recette8-title"><?= $tabcontent[$i]["title"]; ?></p>
      <div class="boutton-timeCell8">
        <i class="iconT8 fa-solid fa-stopwatch"></i>
        <span class="timercell"><?= $tabcontent[$i]["preptime"]; ?></span>
      </div>
      <div class="boutton-catCell8">
        <i class="iconC8 fa-solid fa-utensils"></i>
        <span class="catCell8"><?= $tabcontent[$i]["type"]; ?></span>
      </div>
    </div>


  <?php
    $bdd->connection = null;
  } ?>

  <?php
}

// ___________________________________________________________________________________________

function OneReceipe()
{


  if ($_SERVER['REQUEST_METHOD'] == "GET" and isset($_GET['id'])) {
    $id_recette = $_GET['id'];
  } else {
    $id_recette = rand(1, 17);
  }
  include './bdd.php';
  $postx = $bdd->query('SELECT
    etapes.etape1,
    etapes.etape2,
    etapes.etape3,
    utilisateurs.nom,
    utilisateurs.prenom,
    utilisateurs.avatar,
    nutrition.calories,
    nutrition.fat,
    nutrition.prot,
    nutrition.carbon,
    nutrition.chol,
    recettes.id_recipes,
    recettes.imgplayer,
    recettes.title,
    recettes.date,
    recettes.id_auteur,
    recettes.image_recette,
    recettes.categorie,
    recettes.type,
    recettes.cooktime,
    recettes.preptime,
    recettes.description,
    categories.name,
    ingredients.id_ingredient,
    ingredients.ing_plats1,
    ingredients.ing_plats2,
    ingredients.ing_plats3,
    ingredients.ing_plats4,
    ingredients.ing_plats5,
    ingredients.ing_plats6,
    ingredients.ing_sauce1,
    ingredients.ing_sauce2,
    ingredients.ing_sauce3,
    ingredients.ing_sauce4,
    ingredients.ing_sauce5,
    ingredients.ing_sauce6
From
    recettes Inner Join
    nutrition On nutrition.id_nutrition = recettes.id_recipes 
    Inner Join etapes On etapes.id_etapes = recettes.id_recipes 
    Inner Join ingredients On ingredients.id_ingredient = recettes.id_recipes
    Inner Join categories On recettes.id_cat = categories.id_cat 
    Inner Join utilisateurs On recettes.id_auteur = utilisateurs.id

    WHERE recettes.id_recipes = "' . $id_recette . '" ');


  while ($post = $postx->fetch()) {
    $content[] = [
      'id_recipes' => $post['id_recipes'],
      'title' => $post['title'],
      'id_auteur' => $post['id_auteur'],
      'nom' => $post['nom'],
      'prenom' => $post['prenom'],
      'avatar' => $post['avatar'],
      'preptime' =>  $post['preptime'],
      'cooktime' => $post['cooktime'],
      'image_recette' => $post['image_recette'],
      'categorie' => $post['categorie'],
      'type' => $post['type'],
      'imgplayer' => $post['imgplayer'],
      'description' => $post['description'],
      'date' => $post['date'],
      'id_ingredient' => $post['id_ingredient'],
      'ing_plats1' => $post['ing_plats1'],
      'ing_plats2' => $post['ing_plats2'],
      'ing_plats3' => $post['ing_plats3'],
      'ing_plats4' => $post['ing_plats4'],
      'ing_plats5' => $post['ing_plats5'],
      'ing_plats6' => $post['ing_plats6'],
      'ing_sauce1' => $post['ing_sauce1'],
      'ing_sauce2' => $post['ing_sauce2'],
      'ing_sauce3' => $post['ing_sauce3'],
      'ing_sauce4' => $post['ing_sauce4'],
      'ing_sauce5' => $post['ing_sauce5'],
      'ing_sauce6' => $post['ing_sauce6'],

      'etape1' => $post['etape1'],
      'etape2' => $post['etape2'],
      'etape3' => $post['etape3'],


      'calories' => $post['calories'],
      'fat' => $post['fat'],
      'prot' => $post['prot'],
      'carbon' => $post['carbon'],
      'chol' => $post['chol']
    ];
    $date = date_create($post['date']);
  }

  for ($i = 0; $i < count($content); $i++) { ?>

    <article class="article">
      <span class="title_recette"><?= $content[$i]["title"]; ?></span>
      <div class="gridinfo">
        <div class="auteur">
          <p class="imga"><img class="imgb" src="<?= $content[$i]["avatar"]; ?>" /></p>
          <div class="divname">
            <p class="nameautor"> <?= $content[$i]["nom"]; ?> &zwnj; &zwnj;<?= $content[$i]["prenom"]; ?></p>
            <p class="date_autor"><?= date_format($date, 'd F Y'); ?></p>
          </div>
        </div>
        <div class="cooktime">
          <i class="iconI fa-solid fa-stopwatch"></i>
          <span class="timing">PREP TIME</span>
          <span class="timercell1"> <?= $content[$i]["preptime"]; ?></span>
        </div>
        <div class="preptime"><i class="iconI fa-solid fa-stopwatch"></i>
          <span class="timing">COOK TIME</span>
          <span class="timercell1"><?= $content[$i]["cooktime"]; ?></span>
        </div>
        <div class="category"> <i class="iconI fa-solid fa-utensils"></i>
          <span class="Catcell2"><?= $content[$i]["type"]; ?></span>
        </div>
      </div>

      <grid class="grid_recette">
        <div class="gridGr">
          <div class="image_recette">
            <img class="img_play" src="<?= $content[$i]['imgplayer']; ?>">
            <div class="dotplay">
              <i class="fa-solid fa-play"></i>
            </div>
          </div>
        </div>
        <div class="gridDr">
          <span class="title_nutrition">Nutrition Information</span>
          <div class="gridnutrition">
            <span class="nutrition">Calories</span>
            <span class="nutritionD"><?= $content[$i]["calories"]; ?></span>
            <span class="nutrition">Total Fat</span>
            <span class="nutritionD"><?= $content[$i]["fat"]; ?></span>
            <span class="nutrition">Protein</span>
            <span class="nutritionD"><?= $content[$i]["prot"]; ?></span>
            <span class="nutrition">Carbohydrate</span>
            <span class="nutritionD"><?= $content[$i]["carbon"]; ?></span>
            <span class="nutrition">Cholesterol</span>
            <span class="nutritionD"><?= $content[$i]["chol"]; ?></span>
          </div>
        </div>
      </grid>
    </article>

    <article>
      <p class="resumerecettes"> <?= $content[$i]["description"]; ?></p>
    </article>


    <article>
      <grid class="grid_recette2">
        <div class="gridingredient">
          <span class="title_ing">Ingredients</span>
          <span class="subtitle_ing">For main dish</span>
          <input type="radio" class="ingr">
          <span class="ingredient" onclick="this.style.textDecoration='line-through'"> <?= $content[$i]["ing_plats1"]; ?></span>
          </input>
          <input type="radio" class="ingr">
          <span class="ingredient" onclick="this.style.textDecoration='line-through'"> <?= $content[$i]["ing_plats2"]; ?></span>
          </input>
          <input type="radio" class="ingr">
          <span class="ingredient" onclick="this.style.textDecoration='line-through'"> <?= $content[$i]["ing_plats3"]; ?></span>
          </input>
          <input type="radio" class="ingr">
          <span class="ingredient" onclick="this.style.textDecoration='line-through'"> <?= $content[$i]["ing_plats4"]; ?></span>
          </input>
          <input type="radio" class="ingr">
          <span class="ingredient" onclick="this.style.textDecoration='line-through'"> <?= $content[$i]["ing_plats5"]; ?></span>
          </input>
          <span class="subtitle_ing">For the sauce</span>
          <input type="radio" class="ingr">
          <span class="ingredient" onclick="this.style.textDecoration='line-through'"> <?= $content[$i]["ing_sauce1"]; ?></span>
          </input>
          <input type="radio" class="ingr">
          <span class="ingredient" onclick="this.style.textDecoration='line-through'"> <?= $content[$i]["ing_sauce2"]; ?></span>
          </input>
          <input type="radio" class="ingr">
          <span class="ingredient" onclick="this.style.textDecoration='line-through'"> <?= $content[$i]["ing_sauce3"]; ?></span>
          </input>
        </div>
        <div class="gridingredientD">
          <span class="title_Other">Other Recipe</span>
          <?php gridD(); ?>
          <div class="pubgreen">
            <div class="cellx">
            </div>
          </div>
        </div>
      </grid>
    </article>

    <article>
      <div class="gridetapes">
        <span class="title_etapes">Directions</span>
        <input type="radio" class="ingr1">
        <span class="etapes">Step &zwnj; 1&zwnj; </span>
        <div class="cell01">
          <img src="<?= $content[$i]["image_recette"]; ?>" class="imgrecet">
          <p class="etape"> <?= $content[$i]["etape1"]; ?></p>
          </input>
        </div>
        <input type="radio" class="ingr1">
        <span class="etapes">Step &zwnj; 2&zwnj; </span>
        <p class="etape2"> <?= $content[$i]["etape2"]; ?></p>
        </input>

        <input type="radio" class="ingr1">
        <span class="etapes">Step &zwnj; 3&zwnj; </span>
        <p class="etape2"> <?= $content[$i]["etape3"]; ?></p>
        </input>

      </div>
    </article>




  <?php
    $bdd->connection = null;
  } ?>

  <?php
}


function footernav()
{
  echo '
  <a class="logofoot" href="./index.php"><img src=".././images/Foodieland.png" /></a>
  <div class="spacerfoot"></div>
  <span> <a href="./index.php">Accueil</a></span>
  <span> <a href="./recette.php">Recettes</a></span>
  <span><a href="./contact.php">Contact</a></span>
  <span><a href="./inscription.php">Inscription</a></span>';
}


function gridD()
{

  include './bdd.php';
  $postx = $bdd->query('SELECT
recettes.title,
recettes.preptime,
recettes.image_recette,
recettes.description,
recettes.categorie,
recettes.type,
recettes.date,
recettes.id_recipes,
utilisateurs.nom,
utilisateurs.prenom,
recettes.id_auteur,
utilisateurs.id,
utilisateurs.avatar
FROM
recettes
INNER JOIN utilisateurs ON recettes.id_auteur = utilisateurs.id
ORDER BY RAND() limit 3');

  while ($post = $postx->fetch()) {
    $tabcontent[] = [
      'id_recipes' => $post['id_recipes'],
      'title' => $post['title'],
      'preptime' => $post['preptime'],
      'image_recette' => $post['image_recette'],
      'description' => $post['description'],
      'categorie' => $post['categorie'],
      'type' => $post['type'],
      'nom' => $post['nom'],
      'prenom' => $post['prenom'],

    ];
    $date = date_create($post['date']);
  }

  for ($i = 0; $i < count($tabcontent); $i++) { ?>

    <div class="gridPub">
     <a href="./recette.php?id=<?= $tabcontent[$i]["id_recipes"]; ?>"><img class="minipost" src="<?= $tabcontent[$i]["image_recette"]; ?>"></a>
      <div class="pubtext">
        <p class="titrepub"><?= $tabcontent[$i]["title"]; ?></p>
        <span class="subt">By &zwnj;<?= $tabcontent[$i]["prenom"]; ?> &zwnj;<?= $tabcontent[$i]["nom"]; ?></span>
      </div>
    </div>

  <?php
    $bdd->connection = null;
  } ?>

<?php
}

//-- BACKEND 

function crudrecette()
{
  include './bdd.php';
  if (isset($_SESSION['id'])){
    if ($_SESSION['id'] == '4') {
      $postx = $bdd->query('SELECT
      recettes.title,
      recettes.image_recette,
      recettes.description,
      recettes.categorie,
      recettes.type,
      recettes.id_recipes,
      recettes.id_auteur
  FROM
    recettes
   ORDER BY date DESC');
  
    while ($post = $postx->fetch()) {
      $tabcontent[] = [
        'id_recipes' => $post['id_recipes'],
        'title' => $post['title'],
        'image_recette' => $post['image_recette'],
        'description' => $post['description'],
        'categorie' => $post['categorie'],
        'type' => $post['type'],
      ];
    }
    } else if ($_SESSION['id'] != '4') {
    $thisID = $_SESSION['id'];
    $postx = $bdd->query('SELECT
    recettes.title,
    recettes.image_recette,
    recettes.description,
    recettes.categorie,
    recettes.type,
    recettes.id_recipes,
    recettes.id_auteur
FROM
  recettes
 WHERE id_auteur = "' . $thisID .'" ORDER BY date DESC');

  while ($post = $postx->fetch()) {
    $tabcontent[] = [
      'id_recipes' => $post['id_recipes'],
      'title' => $post['title'],
      'image_recette' => $post['image_recette'],
      'description' => $post['description'],
      'categorie' => $post['categorie'],
      'type' => $post['type'],
    ];
  }
    }
   }

 

  for ($i = 0; $i < count($tabcontent); $i++) { ?>
<tr>
                  <td><?= $tabcontent[$i]["title"]; ?></td>
                  <p>
                      <td><img class="crudimage"src="<?= $tabcontent[$i]["image_recette"]; ?>"></td>
                  <p>
                      <td>
                          <p class="short"><?= $tabcontent[$i]["description"]; ?>
                              .</p>
                      </td>
                  <p>
                      <td><?= $tabcontent[$i]["categorie"]; ?></td>
                      <p>
                        <td><?= $tabcontent[$i]["type"]; ?></td>
                  <p>
                      <td><a class="btn" href="./recette.php?id=<?= $tabcontent[$i]["id_recipes"]; ?>">Aperçu</a></td>
                  <p>
                      <td><a class="btn btn-success" href="./modifier.php?id=<?= $tabcontent[$i]["id_recipes"]; ?>">Modifier</a></td>
                  <p>
                      <td><a class="btn btn-danger" href="./suppr.php?id=<?= $tabcontent[$i]["id_recipes"]; ?>">Supprimer</a></td>
                  <p>
              </tr>

  <?php
    $bdd->connection = null;
  } ?>

  <?php
}
?>