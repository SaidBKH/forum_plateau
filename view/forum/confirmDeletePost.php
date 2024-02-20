
<h1>Supprimer le post</h1>
<p>Voulez-vous vraiment supprimer ce post ?</p>
<form action="index.php?ctrl=forum&action=deletePost&id=<?= $post->getId() ?>" method="post">
    <button type="submit" name="confirm_delete">Oui, supprimer</button>
    <a href="index.php?ctrl=forum&action=listPostsByTopic&id=<?= $topicId ?>">Non, annuler</a>
</form>
