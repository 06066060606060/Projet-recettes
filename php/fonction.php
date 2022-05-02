<?php
session_start();
//AFFICHAGE 'D'UNE RECETTE'_____________________________
function OneReceipe()
{
    include './bdd.php';
    $id_recette = 1;
    $postx = $bdd->query('SELECT
    etapes.etape1,
    etapes.etape2,
    etapes.etape3,
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
    nutrition On nutrition.id_nutrition = recettes.id_recipes Inner Join
    etapes On etapes.id_etapes = recettes.id_recipes Inner Join
    categories On recettes.id_cat = categories.id_cat Inner Join
    ingredients On ingredients.id_ingredient = recettes.id_recipes
    WHERE id = 1');


    while ($post = $postx->fetch()) {
        $content[] = [
            'id_recipes' => $post['id_recipes'],
            'title' => $post['title'],
            'id_auteur' => $post['id_auteur'],
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

            'calories' => $post['calories'],
            'fat' => $post['fat'],
            'prot' => $post['prot'],
            'carbon' => $post['carbon'],
            'chol' => $post['chol']
        ];
        $date = date_create($post['date']);
    }
    
    for ($i = 0; $i < count($content); $i++) { ?>
        <article>
            <div class="box">
                <h2>titre= <?= $content[$i]["title"]; ?></h2>
                <p>id recette = <?=$content[$i]["id_recipes"]; ?></p>
                <p>id auteur = <?=$content[$i]["id_auteur"]; ?></p>
                <p>preptime = <?= $content[$i]["preptime"]; ?></p>
                <p>cooktime = <?= $content[$i]["cooktime"]; ?></p>
                <img class="imgpost" src="<?= $content[$i]["image_recette"]; ?>"></img>
                <p>description = <?= $content[$i]["description"]; ?></p>
                <p>date = <?= date_format($date, 'd/m/Y H:i');?></p>

                <p>ID ingredients = <?=$content[$i]["id_ingredient"]; ?></p>
                <p>ingredient1 = <?=$content[$i]["ing_plats1"]; ?></p>
                <p>ingredient2 = <?=$content[$i]["ing_plats2"]; ?></p>
                <p>ingredient3 = <?=$content[$i]["ing_plats3"]; ?></p>
                <p>ingredient4 = <?=$content[$i]["ing_plats4"]; ?></p>
                <p>ingredient5 = <?=$content[$i]["ing_plats5"]; ?></p>
                <p>ingredient6 = <?=$content[$i]["ing_plats6"]; ?></p>

                <p>sauce1 = <?=$content[$i]["ing_sauce1"]; ?></p>
                <p>sauce2 = <?=$content[$i]["ing_sauce2"]; ?></p>
                <p>sauce3 = <?=$content[$i]["ing_sauce3"]; ?></p>
                <p>sauce4 = <?=$content[$i]["ing_sauce4"]; ?></p>
                <p>sauce5 = <?=$content[$i]["ing_sauce5"]; ?></p>
                <p>sauce6 = <?=$content[$i]["ing_sauce6"]; ?></p>

                <p>etape1 = <?=$content[$i]["etape1"]; ?></p>
                <p>etape2 = <?=$content[$i]["etape2"]; ?></p>
                <p>etape3 = <?=$content[$i]["etape3"]; ?></p>

                <p>calories = <?=$content[$i]["calories"]; ?></p>
                <p>fat = <?=$content[$i]["fat"]; ?></p>
                <p>prot = <?=$content[$i]["prot"]; ?></p>
                <p>carbon = <?=$content[$i]["carbon"]; ?></p>
                <p>chol = <?=$content[$i]["chol"]; ?></p>
            </div>
        </article>
    <?php
        $bdd->connection = null;
    } ?>

<?php
}

?>