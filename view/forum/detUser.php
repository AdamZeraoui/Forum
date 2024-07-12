<?php

$user = $result["data"]['user']; 

foreach($user as $oneUser){ //il faut un foreach pour que les get fonctionne
?>

<h1>Profil de <?= $oneUser->getUsername() ?></h1>

    <p>Date d'inscription <?= $oneUser->getRegistrationDate() ?></p>
<?php }

