<?php
session_start();
//AFFICHAGE 'D'UNE RECETTE'_____________________________
function topnav(){
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

function gridtop(){
  echo '
  <grid class="gridtop">
      <!-- grid cell gauche -->
      <itemsG>
        <div class="divicon">
          <img class="circle" src=".././images/Badge.png" />
          <img class="topblue" src=".././images/Rectangle1.png" />
          <p class="icone1">
            <img class="icon-img" src=".././images/image 14.png" />
            <span class="cat-n">Hot Recipes</span>
          </p>
        </div>
        <div class="divtext">
          <h1 class="titre-recette">Spicy delicious chicken wings</h1>
          <p class="text-home">
            Sunt in culpa qui officia deserunt mollit anim id Sunt in culpa
            qui officia deserunt mollit anim id
          </p>
        </div>
        <div class="boutton-time">
          <i class="fa-solid fa-stopwatch"></i>
          <span class="timer">30 Minutes</span>
        </div>

        <div class="boutton-fork">
          <i class="fa-solid fa-utensils"></i>
          <span class="cat-0">Chicken</span>
        </div>

        <div class="divautor">
          <p class="imga"><img src=".././images/Ellipse2.png" /></p>
          <div class="divname">
            <p class="nameautor">John Smith</p>
            <p class="date_autor">15 March 2022</p>
          </div>
        </div>

        <div class="view_button">
          <span class="btn-title"><a class="link" href="http://">View Recipes</a></span>
          <i class="fa-solid fa-circle-play"></i>
        </div>
      </itemsG>

      <!-- grid cell droite -->
      <itemsD>
        <img class="topdroite" src=".././images/droite.png" />
      </itemsD>
    </grid>';
}

function OneReceipe()
{
    include './bdd.php';
    $id_recette = 1;
    $postx = $bdd->query('SELECT
    etapes.etape1,
    etapes.etape2,
    etapes.etape3,
    etapes.titre_etape1,
    etapes.titre_etape2,
    etapes.titre_etape3,
    utilisateurs.nom,
    utilisateurs.prenom,
    utilisateurs.avatar,
    nutrition.calories,
    nutrition.fat,
    nutrition.prot,
    nutrition.carbon,
    nutrition.chol,
    recettes.id_recipes,
    recettes.title,
    recettes.date,
    recettes.id_auteur,
    recettes.image_recette,
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

    WHERE recettes.id_recipes = 1');


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

            'titre_etape1' => $post['titre_etape1'],
            'titre_etape2' => $post['titre_etape2'],
            'titre_etape3' => $post['titre_etape3'],

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
        <p class="imga"><img class="imgb" src="<?=$content[$i]["avatar"]; ?>" /></p>
        <div class="divname">
          <p class="nameautor"> <?=$content[$i]["nom"]; ?> &zwnj;  &zwnj;<?=$content[$i]["prenom"]; ?></p>
          <p class="date_autor"><?= date_format($date, 'd F Y');?></p>
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
        <span class="Catcell2">Healty</span>
      </div>
    </div>

    <grid class="grid_recette">
      <div class="gridGr">
        <div class="image_recette">
          <img class="img_play" src=".././images/player.png" />
        </div>
      </div>
      <div class="gridDr">
        <span class="title_nutrition">Nutrition Information</span>
        <div class="gridnutrition">
          <span class="nutrition">Calories</span>
          <span class="nutritionD"><?=$content[$i]["calories"]; ?></span>
          <span class="nutrition">Total Fat</span>
          <span class="nutritionD"><?=$content[$i]["fat"]; ?></span>
          <span class="nutrition">Protein</span>
          <span class="nutritionD"><?=$content[$i]["prot"]; ?></span>
          <span class="nutrition">Carbohydrate</span>
          <span class="nutritionD"><?=$content[$i]["carbon"]; ?></span>
          <span class="nutrition">Cholesterol</span>
          <span class="nutritionD"><?=$content[$i]["chol"]; ?></span>
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
        <span class="ingredient" onclick="this.style.textDecoration='line-through'"> <?=$content[$i]["ing_plats1"]; ?></span>
        </input>
        <input type="radio" class="ingr">
        <span class="ingredient" onclick="this.style.textDecoration='line-through'"> <?=$content[$i]["ing_plats2"]; ?></span>
        </input>
        <input type="radio" class="ingr">
        <span class="ingredient" onclick="this.style.textDecoration='line-through'"> <?=$content[$i]["ing_plats3"]; ?></span>
        </input>
        <input type="radio" class="ingr">
        <span class="ingredient" onclick="this.style.textDecoration='line-through'"> <?=$content[$i]["ing_plats4"]; ?></span>
        </input>
        <input type="radio" class="ingr">
        <span class="ingredient" onclick="this.style.textDecoration='line-through'"> <?=$content[$i]["ing_plats5"]; ?></span>
        </input>
        <span class="subtitle_ing">For the sauce</span>
        <input type="radio" class="ingr">
        <span class="ingredient" onclick="this.style.textDecoration='line-through'"> <?=$content[$i]["ing_sauce1"]; ?></span>
        </input>
        <input type="radio" class="ingr">
        <span class="ingredient" onclick="this.style.textDecoration='line-through'"> <?=$content[$i]["ing_sauce2"]; ?></span>
        </input>
        <input type="radio" class="ingr">
        <span class="ingredient" onclick="this.style.textDecoration='line-through'"> <?=$content[$i]["ing_sauce3"]; ?></span>
        </input>
      </div>
      <div class="gridingredientD">
        <span class="title_Other">Other Recipe</span>
        <div class="gridPub">
          <img class="minipost" src=".././images/112.png">
          <div class="pubtext">
            <p class="titrepub">Chicken Meatball with Creamy Chees...</p>
            <span class="subt">By Andreas Paula</span>
          </div>
        </div>
        <div class="gridPub">
          <img class="minipost" src=".././images/113.png">
          <div class="pubtext">
            <p class="titrepub">The Creamiest Creamy Chicken an...</p>
            <span class="subt">By Andreas Paula</span>
          </div>
        </div>
        <div class="gridPub">
          <img class="minipost" src=".././images/114.png">
          <div class="pubtext">
            <p class="titrepub">The Best Easy One Pot Chicken and Rice</p>
            <span class="subt">By Andreas Paula</span>
          </div>
        </div>
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
      <span class="etapes">1. &zwnj; &zwnj;  <?=$content[$i]["titre_etape1"]; ?></span>
      <div class="cell01">
      <img src="<?= $content[$i]["image_recette"]; ?>" class="imgrecet">
      <p class="etape">  <?=$content[$i]["etape1"]; ?></p>
      </input>
    </div>
      <input type="radio" class="ingr1">
      <span class="etapes">2. &zwnj; &zwnj;   <?=$content[$i]["titre_etape2"]; ?></span>
      <p class="etape2">  <?=$content[$i]["etape2"]; ?></p>
      </input>

      <input type="radio" class="ingr1">
      <span class="etapes">3. &zwnj; &zwnj;   <?=$content[$i]["titre_etape3"]; ?></span>
      <p class="etape2">  <?=$content[$i]["etape3"]; ?></p>
      </input>

    </div>
  </article>




    <?php
        $bdd->connection = null;
    } ?>

<?php
}


function footernav(){
  echo '
  <a class="logofoot" href="./index.php"><img src=".././images/Foodieland.png" /></a>
  <div class="spacerfoot"></div>
  <span> <a href="./index.php">Accueil</a></span>
  <span> <a href="./recette.php">Recettes</a></span>
  <span><a href="./contact.php">Contact</a></span>
  <span><a href="./inscription.php">Inscription</a></span>';
}













?>