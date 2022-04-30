<?php
session_start();
//AFFICHAGE 'D'UNE RECETTE'_____________________________
function OneReceipe()
{
    include './bdd.php';
    $id_recette = 1;
    $postx = $bdd->query('SELECT * FROM recettes WHERE id_recipes  = "'. $id_recette . '" ');
    $ingredients = $bdd->query('SELECT * FROM ingredients Inner Join recettes On ingredients.id_ingredient = "'. $id_recette . '" ');
    $etapes = $bdd->query('SELECT * FROM etapes Inner Join ingredients On etapes.id_etapes = "'. $id_recette . '" ');
    $nutritions = $bdd->query('SELECT * FROM nutrition Inner Join recettes On nutrition.id_nut = "'. $id_recette . '" ');

    while ($post = $postx->fetch()) {
        $content[] = [
            'id_recipes' => $post['id_recipes'],
            'title' => $post['title'],
            'id_auteur' => $post['id_auteur'],
            'id_cat' => $post['id_cat'],
            'preptime' =>  $post['preptime'],
            'cooktime' => $post['cooktime'],
            'image_recette' => $post['image_recette'],
            'description' => $post['description'],
            'recette_like' => $post['recette_like'],
            'categorie' => $post['categorie'],
            'type' => $post['type'],
            'date' => $post['date']
        ];
        $date = date_create($post['date']);
    }
    
    while ($ingredient = $ingredients->fetch()) {
        $contenu[] = [
            'id_ingredient' => $ingredient['id_ingredient'],
            'ing_plats1' => $ingredient['ing_plats1'],
            'ing_plats2' => $ingredient['ing_plats2'],
            'ing_plats3' => $ingredient['ing_plats3'],
            'ing_plats4' => $ingredient['ing_plats4'],
            'ing_plats5' =>  $ingredient['ing_plats5'],
            'ing_plats6' => $ingredient['ing_plats6'],
            'ing_sauce1' => $ingredient['ing_sauce1'],
            'ing_sauce2' => $ingredient['ing_sauce2'],
            'ing_sauce3' => $ingredient['ing_sauce3'],
            'ing_sauce4' => $ingredient['ing_sauce4'],
            'ing_sauce5' =>  $ingredient['ing_sauce5'],
            'ing_sauce6' => $ingredient['ing_sauce6'],
        ];
    }

    while ($etape = $etapes->fetch()) {
        $step[] = [
            
            'etape1' => $etape['etape1'],
            'etape2' => $etape['etape2'],
            'etape3' => $etape['etape3'],
        ];

    }

    while ($nutrition = $nutritions->fetch()) {
        $nut[] = [
            'id_nut' => $nutrition['id_nut'],
            'calories' => $nutrition['calories'],
            'fat' => $nutrition['fat'],
            'prot' => $nutrition['prot'],
            'carbon' => $nutrition['carbon'],
            'chol' => $nutrition['chol'],
        ];
    }

    for ($i = 0; $i < count($content); $i++) { ?>
        <article>
            <div class="box">
                <h3>id= <?= $content[$i]["id_recipes"]; ?></h3>
                <h2>titre= <?= $content[$i]["title"]; ?></h2>
                <p>id auteur = <?=$content[$i]["id_auteur"]; ?></p>
                <p>id cat = <?= $content[$i]['id_cat']; ?></p>
                <p>preptime = <?= $content[$i]["preptime"]; ?></p>
                <p>cooktime = <?= $content[$i]["cooktime"]; ?></p>
                <img class="imgpost" src="<?= $content[$i]["image_recette"]; ?>"></img>
                <p>description = <?= $content[$i]["description"]; ?></p>
                <p>like = <?= $content[$i]["recette_like"]; ?></p>
                <p>categorie = <?= $content[$i]["categorie"]; ?></p>
                <p>type = <?= $content[$i]["type"]; ?></p>
                <p>date = <?= date_format($date, 'd/m/Y H:i');?></p>

                <p>ID ingredient = <?=$contenu[$i]["id_ingredient"]; ?></p>
                <p>ingredient1 = <?=$contenu[$i]["ing_plats1"]; ?></p>
                <p>ingredient2 = <?=$contenu[$i]["ing_plats2"]; ?></p>
                <p>ingredient3 = <?=$contenu[$i]["ing_plats3"]; ?></p>
                <p>ingredient4 = <?=$contenu[$i]["ing_plats4"]; ?></p>
                <p>ingredient5 = <?=$contenu[$i]["ing_plats5"]; ?></p>
                <p>ingredient6 = <?=$contenu[$i]["ing_plats6"]; ?></p>

                <p>sauce1 = <?=$contenu[$i]["ing_sauce1"]; ?></p>
                <p>sauce2 = <?=$contenu[$i]["ing_sauce2"]; ?></p>
                <p>sauce3 = <?=$contenu[$i]["ing_sauce3"]; ?></p>
                <p>sauce4 = <?=$contenu[$i]["ing_sauce4"]; ?></p>
                <p>sauce5 = <?=$contenu[$i]["ing_sauce5"]; ?></p>
                <p>sauce6 = <?=$contenu[$i]["ing_sauce6"]; ?></p>

                <p>etape1 = <?=$step[$i]["etape1"]; ?></p>
                <p>etape2 = <?=$step[$i]["etape2"]; ?></p>
                <p>etape3 = <?=$step[$i]["etape3"]; ?></p>

                <p>nutrition id = <?=$nut[$i]["id_nut"]; ?></p>
                <p>calories = <?=$nut[$i]["calories"]; ?></p>
                <p>fat = <?=$nut[$i]["fat"]; ?></p>
                <p>prot = <?=$nut[$i]["prot"]; ?></p>
                <p>carbon = <?=$nut[$i]["carbon"]; ?></p>
                <p>chol = <?=$nut[$i]["chol"]; ?></p>
            </div>
        </article>
    <?php
        $bdd->connection = null;
    } ?>

<?php
}

?>