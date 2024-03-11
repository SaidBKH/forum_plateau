
<?php
// Récupérer les données du contrôleur
    $topic = $result["data"]['topic']; 
    $posts = $result["data"]['posts']; 
?>

<?php if( App\Session::getUser()){?>

    <div class = "listPostsByTopic">
    <h1 class="title"> TOPIC : <?= $topic->getTitle() ?></h1>
        <div class = "listTopicsPosts">
            
            <ul>

                <?php foreach ($posts as $post): ?>
                    <li>
                        <p><?= $post->getText() ?><p><br>
                   <p> par <a href="index.php?ctrl=forum&action=detailProfil&id=<?= $post->getUser()->getId() ?>" ><?= $post->getUser() ?> </a><p><br>
                                (publié le <?= $topic->getCreationDate()->format('d-m-Y H:i')?>)
                        <?php if($post->getUser()->getId() === App\Session::getUser()->getId()): 
                            // autorise la modification et la suppresion uniquement a l'utilsateur qui à crée le post
                            ?>
                        <a href="index.php?ctrl=forum&action=editPost&id=<?= $post->getId() ?>">Modifier</a>
                        <a href="index.php?ctrl=forum&action=confirmDeletePost&id=<?= $post->getId() ?>">Supprimer</a>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>   
        </div>
        <div class = "addTopicPost">
            <h2>Ajouter un message</h2>
            <br>
            <form action="index.php?ctrl=forum&action=addPost" method="post">
                <input type="hidden" name="topic_id" value="<?= $topic->getId()?>">
                <textarea placeholder="Ajouter un message" name="text" rows="4" cols="50" required style="text-align: center;"></textarea><br>
                <button type="submit">Envoyer</button>
            </form>
        </div>
    </div>
<?php }  else { ?>
 <div class = "loginOrRegister">
 <p>veuillez vous <a href="index.php?ctrl=security&action=registerForm">connecter</a> ou vous <a href="index.php?ctrl=security&action=registerForm">inscrire</a> pour acceder au forum </p>
 </div>
 <?php } ?>

