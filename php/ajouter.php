<?php 
include './fonction.php';
session_start();
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
  <div id="overlay"></div>
  <!-- BARRE DE MENU -->
  <div class="topnav">
    <a class="logo" href="#"><img src=".././images/Foodieland.png" /></a>
    <div class="spacer"></div>
    <span> <a href=".././index.html">Accueil</a></span>
    <span> <a href="./backend.html">Liste des recettes</a></span>
    <span> <a href="./categorie.html">Liste des Catégories</a></span>
    <span onclick=""><a href="#">Logout</a></span>
    <div></div>
  </div>

  <!----------------------------------------->
  <article class="article">
    <h2 class="title_add">Ajouter Recette</h2>
    <form action="/action_page.php">
      <div class="grid_add">
        <div class="cook">
          <input type="text" id="time" name="preptime" placeholder="Temps de preparation en minutes"/>
        </div>
        <div class="cook">
        <input type="text" id="time2" name="cooktime" placeholder="temps de cuisson en minutes"/>
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
          <input type="text" class="videourl" name="subject" placeholder="Url de la vidéo..." />
          <textarea class="resume" name="subject" placeholder="Resumé de la recette.."></textarea>

        <div class="grid2">
          <div class="gridingredient">
            <h2>Liste des Ingredients:</h2>
            <h2>Pour le plats:</h2>
            <input type="text" id="cingr" name="prepa" placeholder="Ingredient 1..." />
            <input type="text" id="cingr" name="prepa" placeholder="Ingredient 2..." />
            <input type="text" id="cingr" name="prepa" placeholder="Ingredient 3..." />
            <input type="text" id="cingr" name="prepa" placeholder="Ingredient 4..." />
            <input type="text" id="cingr" name="prepa" placeholder="Ingredient 5..." />
            <input type="text" id="cingr" name="prepa" placeholder="Ingredient 6..." />
            <h2>Pour la sauce:</h2>
            <input type="text" id="cingr" name="prepa" placeholder="Sauce 1..." />
            <input type="text" id="cingr" name="prepa" placeholder="Sauce 2..." />
            <input type="text" id="cingr" name="prepa" placeholder="Sauce 3..." />
            <input type="text" id="cingr" name="prepa" placeholder="Sauce 4..." />
            <input type="text" id="cingr" name="prepa" placeholder="Sauce 5..." />
            <input type="text" id="cingr" name="prepa" placeholder="Sauce 6..." />
            <h2>Infos Nutritionnelles:</h2>
            <input type="text" id="cingr" name="prepa" placeholder="Calories..." />
            <input type="text" id="cingr" name="prepa" placeholder="Graisse..." />
            <input type="text" id="cingr" name="prepa" placeholder="Proteine..." />
            <input type="text" id="cingr" name="prepa" placeholder="Glucide..." />
            <input type="text" id="cingr" name="prepa" placeholder="Cholesterol..." />
          </div>
          <div class="gridetape">
            <h2>Liste des Etapes:</h2>
            <textarea class="resume" name="subject" placeholder="Etapes 1.."></textarea>
            <div class="boutonimg">
              <label for="file" class="label-file">Choisir l'image</label>
              <input id="file" class="input-file" type="file" />
            </div>
            <textarea class="resume" name="subject" placeholder="Etapes 2.."></textarea>
            <textarea class="resume" name="subject" placeholder="Etapes 3.."></textarea>
            <textarea class="resume" name="subject" placeholder="Etapes 4.."></textarea>
          </div>
          <div class="bouton">
            <input class="btn_add" type="submit" value="Publier la nouvelle recette" />
          </div>
        </div>
    </form>
  </article>

  <div class="footernav">
    <a class="logofoot" href="#"><img src=".././images/Foodieland.png" /></a>
    <div class="spacerfoot"></div>
    <span> <a href=".././index.html">Accueil</a></span>
    <span> <a href=".././recette.html">Recettes</a></span>
    <span><a href=".././contact.html">Contact</a></span>
    <span><a href=".././inscription.html">Inscription</a></span>
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