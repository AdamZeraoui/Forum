<?php

$user = $result["data"]['user']; 

foreach($user as $oneUser){
?>

<h1>Profil de <?= $oneUser->getUsername() ?></h1>

    <p>Date d'inscription <?= $oneUser->getRegistrationDate() ?></p>
<?php }

