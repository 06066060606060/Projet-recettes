
<?php
session_start();
//AFFICHAGE  PAGE D'ACCUEIL_____________________________
function indexpage()
{
    include './bdd.php';
        $postx = $bdd->query('SELECT * FROM recettes ');
 

    while ($post = $postx->fetch()) {

        $content[] = [
            'id_recette' => $post['id_recipes'],
            'titre_post' => $post['title'],
            'id_auteur' => $post['id_auteur'],
            'id_cat' => $post['id_cat'],
            'time' =>  $post['preptime'],
            'cooktime' => $post['cooktime'],
            'imagerec' => $post['image_recette'],
            'contenu' => $post['description'],
            'reclike' => $post['recette_like'],
            'date' => $post['date']
        ];
        $date = date_create($post['date']);
    }
    

    for ($i = 0; $i < count($content); $i++) { ?>
        <article>
            <div class="box animate__animated animate__backInDown">
                
                    <h2><?= $content[$i]["titre_post"]; ?></h2>
                    <img class="imgpost" src="<?= $content[$i]["imagerec"]; ?>"></img>
                    <p><?= $content[$i]["contenu"]; ?></p>
                     <p><?= $content[$i]['reclike']; ?></p>
                     <p><?= $content[$i]["id_recette"]; ?></p>
                     <p><?= $content[$i]["id_cat"]; ?></p>
                     <p><?= $content[$i]["id_auteur"]; ?></p>
                     <p><?= $content[$i]["cooktime"]; ?></p>
                     <p><?= $content[$i]["date"]; ?></p>
      
            </div>
        </article>
    <?php
        $bdd->connection = null;
    } ?>
    <?php
}

?>



