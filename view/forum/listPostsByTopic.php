<?php
    $posts = $result["data"]['posts']; 

?>

<h1>Liste des postes</h1>

<?php
foreach($posts as $post){ ?>

    <p><?= $post->getContent()?></br>
    Signer par <a href="index.php?ctrl=forum&action=showDetUser&id=<?= $post->getUser()->getId();?>"><?= $post->getUser()->getUsername()?></a></br></br>

    <a href="#">Editer</a></br>
    <a href="#">Supprimer</a></br></br></p>

    
<?php } ?>

    <p> <a href="#">Ecrire un message</a></p>


<!-- ajouter des boutons pour Add +form, Editer+form et Supprimer un poste -->