<?php
    $users = $result["data"]['users']; 
?>

<h1>Liste des users</h1>

<?php
foreach($users as $user){ ?>
    <p><?= $user->getUsername() ?></p>
<?php } 

