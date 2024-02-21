<?php
    $topic = $result["data"]['topic']; 
?>


<h1>Modifier le topic</h1>
<form action="index.php?ctrl=forum&action=updateTitle&id=<?= $topic->getId() ?>" method="post">
    <label for="titre">Titre du topic :</label><br>
    <textarea name="text"><?= $topic->getTitle() ?></textarea><br>
    <button type="submit">Modifier</button>
</form>