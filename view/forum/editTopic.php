<?php
    $topic = $result["data"]['topic']; 
?>


<h1>Modifier le topic</h1>
<form action="index.php?ctrl=forum&action=updateTopic&id=<?= $topic->getId() ?>" method="post">
    <label for="title">Texte du post :</label><br>
    <textarea name="title" id="title"><?= $topic->getTitle() ?></textarea><br>
    <button type="submit">Modifier</button>
</form>