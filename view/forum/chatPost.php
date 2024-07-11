<?php
    $content = $result["data"]['post']; 
?>

<h1>Liste des post</h1>

<?php
foreach($content as $contentPost ){ ?>
    <p><a href="#"><?php $content->getcontent();?></a></br>
    Signer <?= $contentPost->getUser?></p>
<?php }


