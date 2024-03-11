
<?php
    $user = $result["data"]['user']; 
    $posts = $result["data"]['posts']; 

    ?>
<div class="detailProfil">
    <div class="detail">
        <h1>profil de <?= $user->getNickName()?></h1>
        <br>
        <p>pseudo: <?= $user->getNickName() ?>
        <p>Role : <?= $user->getRole() ?>
    </div>


    <div class="listPostByUser">
            <h1>LISTE DES POSTS</h1>
            <br>
                <ul>
                    <?php foreach($posts as $post ){ ?>
                    <li><p> category : <?= $post->getTopic()->getCategory()?><p>
                      <?= $post->getText()?>
                     publié le : <?= $post->getCreationDate()->format('d-m-Y H:i')?></li>
                    <?php }?>
                </ul>
        </div>
 </div>
