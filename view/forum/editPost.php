<?php
    $post = $result["data"]['post']; 
?>

<div class = "edit">
<h1>Modifier le post</h1>
<form action="index.php?ctrl=forum&action=updatePost&id=<?= $post->getId() ?>" method="post">
    <label for="text"></label><br>
    <textarea name="text" id="text"><?= $post->getText() ?></textarea><br>
    <button type="submit">Modifier</button>
</form>
</div>