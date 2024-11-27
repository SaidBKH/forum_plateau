<?php

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\CategoryManager;
use Model\Managers\PostManager;
use Model\Managers\TopicManager;
use Model\Managers\UserManager;
use controller\ForumController;
use model\entities;
use controller\SecurityController;

$categories = $result["data"]['categories'];
$latestTopics = $result["data"]['latestTopics'];

$statUsers = $result["data"]["statUsers"];    
$statPosts = $result["data"]["statPosts"];    
$statTopics = $result["data"]["statTopics"];

?>
<div id ="accueil">

    <?php if(Session::isAdmin()) { ?>

        <h1>BIENVENUE ADMIN-<?= $_SESSION["user"]->getNickName() ?></h1>

    <?php } else if(Session::getUser()) { ?>

        <h1>BIENVENUE <?= $_SESSION["user"]->getNickName() ?></h1>

    <?php } else { ?>
        
        <h1>BIENVENUE SUR IA ODYSSEE</h1>
        <br>
            <p>Bienvenue dans l’univers fascinant de l’intelligence artificielle ! 
                <br>
                <br>
                <br>
             IA Odyssée est un forum dédié à tous ceux qui souhaitent discuter des dernières avancées, 
            partager des connaissances et découvrir les innovations du domaine de l'IA. 
            Rejoignez-nous pour accéder à nos discussions et ressources exclusives.
            </p>



    <div id="loginRegister">
        <div id="loginForm">
            <h2>Login</h2>
            <form action="index.php?ctrl=security&action=login" method="post">
                <label for="email"></label><br>
                <input placeholder="mail" type="email" id="email" name="email" required style="text-align: center;"><br>
                <label for="password"></label><br>    
                <input placeholder="mot de passe" type="password" id="password" name="password" required style="text-align: center;"><br>
                <button type="submit">SE CONNECTER</button>
            </form>
        </div>
        <br>
    
        <div class="registerButton">
            <button name="register"> <a href="index.php?ctrl=security&action=registerForm">JE M'INSCRIS</a></button>
        </div>
    </div>
    <?php } ?>
</div>

<div class = "homeList">
    <div class="listCategory">
        <h1>LISTE DES CATEGORIES</h1>
        <br>
        <ul>
            <?php foreach($categories as $category): ?>
                <li>
                    <a href="index.php?ctrl=forum&action=listTopicsByCategory&id=<?= $category->getId() ?>">
                        <span style="text-transform:uppercase"><?= $category->getName() ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="lastTopic">
        <br>
        <h1>DERNIERS SUJETS</h1>
        <br>
        <ul>
            <?php foreach ($latestTopics as $topic): ?>
                <li>
                    <p>Catégorie : <a href="index.php?ctrl=forum&action=listTopicsByCategory&id=<?= $topic->getCategory()->getId() ?>">
                        <?= $topic->getCategory() ?></a><br>
                        <a href="index.php?ctrl=forum&action=listPostsByTopic&id=<?= $topic->getId() ?>">
                            <?= $topic->getTitle() ?>
                        </a>  
                        par : <a href="index.php?ctrl=forum&action=detailProfil&id=<?= $topic->getUser()->getId() ?>">
                            <?= $topic->getUser() ?>
                        </a>
                        publié le : <?= $topic->getCreationDate() ?>
                    </p>
                </li>
            <?php endforeach; ?>
        </ul>    
    </div>
</div>

<div class="statistics">
    <h1>STATISTIQUES</h1>
    <table>                
        <tr>
            <td><a href="index.php?ctrl=forum&action=listUser">Membres :</a></td>
            <td>
                <?php foreach($statUsers as $stat): ?>
                    <?= $stat->getReCount() . " membres" ?>
                <?php endforeach; ?>
            </td>
        </tr>

        <tr>
            <td>Topics :</td>
            <td>
                <?php foreach($statTopics as $stat): ?>
                    <?= $stat->getReCount() . " discussions" ?>
                <?php endforeach; ?>
            </td>
        </tr>

        <tr>
            <td>Posts :</td>    
            <td>
                <?php foreach($statPosts as $stat): ?>
                    <?= $stat->getReCount() . " messages" ?>
                <?php endforeach; ?>
            </td>
        </tr>
    </table>            
</div>
