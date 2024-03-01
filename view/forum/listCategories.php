<?php
    $categories = $result["data"]['categories']; 
?>


<div class="categoryPage">

    <div class="listCategory">
    <h1>Liste des catégories</h1>
<br>
        <?php
        foreach($categories as $category ){ ?>
            <p><a href="index.php?ctrl=forum&action=listTopicsByCategory&id=<?= $category->getId() ?>"><?= $category->getName() ?></a></p>
        <?php

}?>

</div>




