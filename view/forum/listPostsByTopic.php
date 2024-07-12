<?php
    $posts = $result["data"]['posts']; 

?>

<h1>Liste des postes</h1>

<?php
foreach($posts as $post){ ?>

    <p><?= $post->getContent()?></br>
    Signer par <?= $post->getUser()->getUsername()?></p>
<?php }


