
<?php
    $user = $result["data"]['user']; 
    $posts = $result["data"]['posts']; 

    ?>

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
                    <li> category :<?= $post->getTopic()->getCategory()?></li>
                <li> post : <?= $post->getText()?></li>
                <li> publié le : <?= $post->getCreationDate()->format('d-m-Y H:i')?></li>
                <?php }?>
            </ul>
    </div>
