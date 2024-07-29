<?php
    $posts = $result["data"]['posts']; 
?>

<h1>Liste des postes</h1>

<?php
foreach($posts as $post){ ?>

    <p><?= $post->getContent()?></br>
    Signer par <a href="index.php?ctrl=forum&action=showDetUser&id=<?= $post->getUser()->getId();?>"><?= $post->getUser()->getUsername()?></a></br></br>

    <a href="index.php?ctrl=forum&action=showEditPost&id=<?= $post->getId();?>">Editer</a></br>
    <a href="index.php?ctrl=forum&action=delPost&id=<?= $post->getId();?>">Supprimer</a></br></br></p>

    
<?php } ?>
<form action="index.php?ctrl=forum&action=addNewPost" method="post">
    <label for="newPost">Ecrire le nouveau message :</label><br>

    <textarea id="newPost" name="content" placeholder=" Nouveau message ici." cols="40" rows="10"></textarea><br><br>

    <input type="submit" name="submit" value="Envoyer" />
    </br></br>

</form>