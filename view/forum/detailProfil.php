
<?php
    $user = $result["data"]['user']; 
    $post = $result["data"]['posts']; 

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
                    
                <li><?= $post->getText()?></li>
                <li><?= $post->getCreationDate()?></li>

                <?php }?>
            </ul>
    </div>

