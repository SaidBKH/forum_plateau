<?php $topic = $result["data"]['topic']; 
//var_dump($topic);die;
?>

<h1>Supprimer le topic</h1>
<p>Voulez-vous vraiment supprimer ce topic ?</p>
<form action="index.php?ctrl=forum&action=deleteTopic&id=<?= $topic->getId() ?>" method="post">

    <button type="submit" name="confirm_delete">Oui, supprimer</button>
    <a href="index.php?ctrl=forum&action=listPostsByTopic&id=<?= $id ?>">Non, annuler</a>
</form>
