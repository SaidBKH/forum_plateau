<?php 
use App\Session;

?>

    <div id="profil">
    <h1> Profil de <?= $_SESSION["user"]->getNickName() ?></h1>
            <div class="profil-info">
<br>
                <p>Pseudo : <?= $_SESSION["user"]->getNickName() ?></p>
                
                <p>Email : <?= $_SESSION["user"]->getEmail() ?></p>

                <p>Role : <?= $_SESSION["user"]->getRole() ?></p>
            </div>

        </div>

    


