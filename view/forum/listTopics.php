<?php
$category = $result["data"]['category']; 
$topics = $result["data"]['topics'];
?>

<?php if( App\Session::getUser()){ ?>

<div class = "listTopicBycategory">
    <div class = "listTopicsPosts">
        <h1>Liste des topics <?= $category->getName() ?></h1>
        <br>
        <ul>
            <?php foreach ($topics as $topic): ?>
                <li>
                    <a href="index.php?ctrl=forum&action=listPostsByTopic&id=<?= $topic->getId() ?>">
                        <?= $topic->getTitle() ?> par <a href="index.php?ctrl=forum&action=detailProfil&id=<?= $topic->getUser()->getId() ?>" ><?= $topic->getUser() ?> </a>
                        (publié le <?= $topic->getCreationDate()->format('d-m-Y H:i')?>) <!-- dateTime-->
                    </a>
                                        
                    <?php if($topic->getUser()->getId() === App\Session::getUser()->getId()): ?>
                        <!-- si l'auteur du topic est le meme (===) que celui connecter  -->

                        <!-- Vérifie si l'utilisateur actuel est l'auteur du topic -->
                        <a href="index.php?ctrl=forum&action=editTopic&id=<?= $topic->getId() ?>">Modifier</a>
                        <a href="index.php?ctrl=forum&action=confirmDeleteTopic&id=<?= $topic->getId() ?>">Supprimer</a>
                        
                        <?php if($topic->getClosed()): ?>
                            <!-- Si le topic est verrouillé, affiche le lien pour le déverrouiller -->
                            <a href="index.php?ctrl=forum&action=unlockTopic&id=<?= $topic->getId() ?>">Déverrouiller</a>
                        <?php else: ?>
                            <!-- Si le topic est déverrouillé, affiche le lien pour le verrouiller -->
                            <a href="index.php?ctrl=forum&action=lockTopic&id=<?= $topic->getId() ?>">Verrouiller</a>
                        <?php endif; ?>                     
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>

    </div>
    <div class = "addTopicPost" >
        <h1>Ajouter un topic</h1>
        <form action="index.php?ctrl=forum&action=addTopic" method="post">
            <label for="title"></label><br>
            <input placeholder="Titre du topic" type="text" id="title" name="title" required style="text-align: center;"><br>

            <label for="text"></label><br>
            <textarea  placeholder="Ajouter un premier message" id="text" name="text" rows="4" cols="50" required style="text-align: center;"></textarea><br>

            <input type="hidden" id= category_id name="category_id" value="<?= $category->getId()?>">
            
            <button type="submit">Créer le topic</button>
        </form>
    </div>
 </div>
 <?php } else {?>
 <div class = "loginOrRegister">
 <p>veuillez vous <a href="index.php?ctrl=security&action=registerForm">connecter</a> ou vous <a href="index.php?ctrl=security&action=registerForm">inscrire</a> pour acceder au forum </p>
 </div>
 <?php }?>
