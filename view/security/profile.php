<?php 
use App\Session;

?>
    </div>

    <div id="profil">
    <h1> Profil de <?= $_SESSION["user"]->getNickName() ?></h1>
            <div class="profil-info">

                <p>Pseudo</p>
                <p><?= $_SESSION["user"]->getNickName() ?></p>
                
                <p>Email</p>
                <p><?= $_SESSION["user"]->getEmail() ?></p>


            </div>

        </div>
