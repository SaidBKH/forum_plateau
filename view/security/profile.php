<?php 
use App\Session;

    $posts = $result["data"]['posts']; 

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

    
        <div class="listPostByUser">
            <h1>LISTE DES POSTS</h1>
            <br>
                <ul>
                    <?php foreach($posts as $post ){ ?>
                    <li><p> category : <?= $post->getTopic()->getCategory()?><p>
                      <?= $post->getText()?>
                     publié le : <?= $post->getCreationDate()?></li>
                    <?php }?>
                </ul>
        </div>
 </div>
