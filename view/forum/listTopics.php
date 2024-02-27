<?php
$category = $result["data"]['category']; 
$topics = $result["data"]['topics'];
?>

<h1>Liste des topics <?= $category->getName() ?></h1>

<ul>
    <?php foreach ($topics as $topic): ?>
        <li>
            <a href="index.php?ctrl=forum&action=listPostsByTopic&id=<?= $topic->getId() ?>">
                <?= $topic->getTitle() ?> par <?= $topic->getUser() ?>
                (publié le <?= $topic->getCreationDate()->format('d-m-Y H:i')?>)
            </a>
           
            <?php if($topic->getUser()->getId() === App\Session::getUser()->getId()): ?>
                <a href="index.php?ctrl=forum&action=editTopic&id=<?= $topic->getId() ?>">Modifier</a>
                <a href="index.php?ctrl=forum&action=confirmDeleteTopic&id=<?= $topic->getId() ?>">Supprimer</a>
                
                <?php if(!$topic->getClosed()): ?>
                    <a href="index.php?ctrl=forum&action=lockTopic&id=<?= $topic->getId() ?>">Verrouiller le sujet</a>
                <?php else: ?>
                    <span>Ce sujet est verrouillé</span>
                <?php endif; ?>
            <?php endif; ?>
        </li>
    <?php endforeach; ?>
</ul>

<h2>Ajouter un nouveau topic</h2>
<form action="index.php?ctrl=forum&action=addTopic" method="post">
    <label for="title">Titre du topic :</label><br>
    <input type="text" id="title" name="title" required><br>

    <label for="text">Premier message :</label><br>
    <textarea id="text" name="text" rows="4" cols="50" required></textarea><br>

    <input type="hidden" id= category_id name="category_id" value="<?= $category->getId()?>">
    
    <button type="submit">Créer le topic</button>
</form>
