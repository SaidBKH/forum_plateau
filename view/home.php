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

$categories = $result["data"]['categories'];
$latestTopics = $result["data"]['latestTopics'];

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
            au contenu du forum et à tout nos services.</p>
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


            <div class="listCategory">
                <h1>Liste des catégories</h1>
                <br>
                <?php foreach($categories as $category ){ ?>
                <p><a href="index.php?ctrl=forum&action=listTopicsByCategory&id=<?= $category->getId() ?>"><?= $category->getName() ?></a></p>
                <?php }?>
            </div>

            <div class="lastTopic">

            <div class="lastTopicTitle">
                <h4>Last Topic</h4>
                </div>

                <ul>
                     <?php foreach ($latestTopics as $topic): ?>
                        <li>category: <a href="index.php?ctrl=forum&action=listTopicsByCategory&id=<?= $category->getId() ?>"><?= $topic->getCategory() ?></a><br>
                        <a href="index.php?ctrl=forum&action=listPostsByTopic&id=<?= $topic->getId() ?>"> <?= $topic->getTitle() ?></a>
                         par : <?= $topic->getUser() ?>
                        publié le : <?= $topic->getCreationDate()->format('d-m-Y H:i')?></li>
                       
                    <?php endforeach; ?>
                </ul>
             </div>
       