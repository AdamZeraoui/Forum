<?php
    $category = $result["data"]['category']; 
    $topics = $result["data"]['topics']; 
?>

<h1>Liste des topics</h1>

<?php
foreach($topics as $topic ){ ?>
    <p><a href="index.php?ctrl=forum&action=showPostsByTopic&id=<?= $topic->getID() ?>"><?= $topic ?></a> 
    crée par <!-- <a href="index.php?ctrl=forum&action=showDetUsers&id=<?= $topic->getUser()->getId();?>"> --><?= $topic->getUser();?><!-- </a>  --></p>
<?php } 

