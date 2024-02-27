
<?php
// Récupérer les données du contrôleur
    $topic = $result["data"]['topic']; 
    $posts = $result["data"]['posts']; 
?>

<h1><?= $topic->getTitle() ?></h1>


<ul>
    <?php foreach ($posts as $post): ?>
        <li>
            <?= $post->getText() ?> par <?= $post->getUser() ?>
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

<h2>Ajouter un message</h2>
<form action="index.php?ctrl=forum&action=addPost" method="post">
    <input type="hidden" name="topic_id" value="<?= $topic->getId()?>">
    <textarea name="text" rows="4" cols="50" required></textarea><br>
    <button type="submit">Envoyer</button>
</form>


<?php 
