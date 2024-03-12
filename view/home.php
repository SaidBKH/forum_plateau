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

        <h1>BIENVENUE SUR LE FORUM <?= $_SESSION["user"]->getNickName() ?></h1>

    <?php } else { ?>
        
        <h1>BIENVENUE SUR LE FORUM</h1>
        <br>
            <p>Vous devez vous inscrire ou vous connecter au forum pour accéder
            au contenu du forum et à tout nos services.
            </p>
</div>

<div id="loginRegister">
    <div id="loginForm">
         <h2> login</h2>
            <form action="index.php?ctrl=security&action=login" method="post">
                <label for="email"></label><br>
                <input placeholder="mail" type="email" id="email" name="email" required style="text-align: center;"><br>
                <label for="password"></label><br>    
                <input placeholder=" mot de passe" type="password" id="password" name="password" required style="text-align: center;"><br>
                <button type="submit">SE CONNECTER</button>
            </form>
    </div>
    <br>
    
        <div class="registerButton">
            <button name="register"> <a href="index.php?ctrl=security&action=registerForm">JE M'INSCRIS </button>
        </div>
        <?php } ?>
    </div>

<div class = "homeList">
    <div class="listCategory">
        <h1>LISTE DES CATEGORIES</h1>
        <br>
            <ul>
                <?php foreach($categories as $category ){ ?>
                <li><a href="index.php?ctrl=forum&action=listTopicsByCategory&id=<?= $category->getId() ?>"><span style="text-transform:uppercase"><?= $category->getName() ?></span></a></li>
                <?php }?>
            </ul>
    </div>

    <div class="lastTopic">
        <br>
            <h1>DERNIERS SUJETS</h1>
        <br>
            <ul>
            <?php foreach ($latestTopics as $topic): ?>
                 <li>
                        <p>category :<a href="index.php?ctrl=forum&action=listTopicsByCategory&id=<?= $topic->getCategory()->getId() ?>" ><?= $topic->getCategory()?></a><br>
                        <a href="index.php?ctrl=forum&action=listPostsByTopic&id=<?= $topic->getId() ?>"><?= $topic->getTitle() ?></a>  
                         par :  <a href="index.php?ctrl=forum&action=detailProfil&id=<?= $topic->getUser()->getId() ?>" ><?= $topic->getUser() ?> </a>
                        publié le : <?= $topic->getCreationDate() ?></p>     
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
                    <?php foreach($statUsers as $stat) { 
                    echo  $stat->getReCount()." membres";                                                                 
                    } ?>
                </td>
            </tr>

            <tr>
                <td>Topics :</td>
                <td>
                     <?php foreach($statTopics as $stat) { 
                     echo $stat->getReCount() ." discussions";
                    } ?>
                </td>
            </tr>

            <tr>
                <td>Posts :</td>    
                <td>
                    <?php foreach($statPosts as $stat) {
                    echo $stat->getReCount()." messages";
                    } ?>
                </td>
            </tr>
    </table>            
</div>
             

