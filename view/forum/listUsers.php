<?php
    $users = $result["data"]['users']; 
?>

<div class ="listUser">
<h1>Liste des utilisateurs</h1>
<br>
<?php
foreach($users as $user ){ ?>
    <p><a href="index.php?ctrl=user&action=profile&id=<?= $user->getId() ?>"><?= $user->getNickName() ?></a></p>
<?php }






  
