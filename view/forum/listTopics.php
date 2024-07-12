<?php
    $category = $result["data"]['category']; 
    $topics = $result["data"]['topics']; 
?>

<h1>Liste des topics</h1>

<?php
foreach($topics as $topic ){ ?>
    <p><a href="index.php?ctrl=forum&action=showPostsByTopic&id=<?= $topic->getId() ?>"><?= $topic ?></a> 
    crée par <a href="index.php?ctrl=forum&action=showDetUser&id=<?= $topic->getUser()->getId();?>"> <?= $topic->getUser();?> </a> </p>
<?php } ?></br>    <a href="#">Ajouter un topic</a></br>
    <a href="#">Supprimer un topic</a></br></br></p>

<!-- ajouter un bouton pour Add+form et Supprimer un Topic -->