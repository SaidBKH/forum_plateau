

<h1>Modifier le post</h1>
<form action="index.php?ctrl=forum&action=updatePost&id=<?= $post->getId() ?>" method="post">
    <label for="text">Texte du post :</label><br>
    <textarea name="text"><?= $post->getText() ?></textarea><br>
    <button type="submit">Modifier</button>
</form>