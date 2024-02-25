<?php
    $categories = $result["data"]['categories']; 
?>

<h1>Liste des catégories</h1>

<a href="index.php?ctrl=forum&action=addCategory"> add a category : </a>

<?php
foreach($categories as $category ){ ?>
    <p><a href="index.php?ctrl=forum&action=listTopicsByCategory&id=<?= $category->getId() ?>"><?= $category->getName() ?></a></p>
<?php

}?>




