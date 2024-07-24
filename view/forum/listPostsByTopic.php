<?php
    $posts = $result["data"]['posts']; 

?>

<h1>Liste des postes</h1>

<?php
foreach($posts as $post){ ?>

    <p><?= $post->getContent()?></br>
    Signer par <a href="index.php?ctrl=forum&action=showDetUser&id=<?= $post->getUser()->getId();?>"><?= $post->getUser()->getUsername()?></a></br></br>

    <a href="#">Editer</a></br>
    <a href="index.php?ctrl=forum&action=delPost&id=<?= $post->getId();?>">Supprimer</a></br></br></p>

    
<?php } ?>
<form>
    <label for="newPost">Ecrire un nouveau message :</label><br>


    <input type="text" id="newPost" name="newPost" placeholder=" Nouveau message ici."></textarea><br><br> <!-- attendre de voir session pour faire fonctionner correcterment -->

    <a href="#"><input type="submit" value="Envoyer" /></a>

</form>