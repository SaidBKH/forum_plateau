<?php
    $category = $result["data"]['category']; 
    $topics = $result["data"]['topics']; 
?>

<h1>Liste des topics</h1>



<ul>
    <?php foreach ($topics as $topic): ?>
        <li>
        <a href="index.php?ctrl=forum&action=listPostsByTopic&id=<?= $topic->getId() ?>"> <?= $topic->getTitle() ?> par <?= $topic->getUser() ?>
            <a href="index.php?ctrl=forum&action=editTopic&id=<?= $topic->getId() ?>">Modifier</a>
            <a href="index.php?ctrl=forum&action=confirmDeleteTopic&id=<?= $topic->getId() ?>">Supprimer</a>
        </li>
    <?php endforeach; ?>
</ul>
