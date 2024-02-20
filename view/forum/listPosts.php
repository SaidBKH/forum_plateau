
<?php
// Récupérer les données du contrôleur
    $topic = $result["data"]['topic']; 
    $posts = $result["data"]['posts']; 
?>

<h1>Liste des posts</h1>

<ul>
    <?php foreach ($posts as $post): ?>
        <li>
            <?= $post->getText() ?> par <?= $post->getUser() ?>
            <a href="index.php?ctrl=forum&action=editPost&id=<?= $post->getId() ?>">Modifier</a>
            <a href="index.php?ctrl=forum&action=confirmDeletePost&id=<?= $post->getId() ?>">Supprimer</a>
        </li>
    <?php endforeach; ?>
</ul>

<?php 
