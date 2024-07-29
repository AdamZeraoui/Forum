<?php

$post = $result["data"]['post']; 

//view pour le form de editPost
?>

<form action="index.php?ctrl=forum&action=editPost&id=<?=$post->getId()?>" method="post">
    <label for="<?=$post->getId()?>">Ecrire le nouveau message :</label><br>

    <textarea id="<?=$post->getId()?>" name="content" placeholder="" cols="40" rows="10"><?= $post->getContent()?></textarea><br><br>

    <input type="submit" name="submit" value="Envoyer" />
    </br></br>

</form>