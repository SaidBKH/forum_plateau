<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="<?= $meta_description ?>">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://cdn.tiny.cloud/1/zg3mwraazn1b2ezih16je1tc6z7gwp5yd4pod06ae5uai8pa/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
        <link rel="stylesheet" href="<?= PUBLIC_DIR ?>/css/style.css">
        <title>FORUM</title>
    </head>
    <body>
        <!-- <header>
                <nav>
                    <div id="nav-left">
                        <a href="index.php?ctrl=forum_plateau">ACCUEIL
                        </a>
                        <a href="index.php?ctrl=forum&action=listCategory">CATEGORIE</a>
                            <?php if(App\Session::isAdmin()): ?>
                            <a href="index.php?ctrl=home&action=users">Voir la liste des gens</a>
                    <?php endif; ?>
                            </div>

                            <div id="nav-right">
                                <?php if(App\Session::getUser()): ?>
                                    <a href="index.php?ctrl=security&action=profile"><span class="fas fa-user"></span>&nbsp;<?= App\Session::getUser()->getNickName() ?></a>
                                    <a href="index.php?ctrl=security&action=logout">Déconnexion</a>
                                <?php else: ?>
                                    <a href="index.php?ctrl=security&action=loginForm">SE CONNECTER </a>
                                    <a href="index.php?ctrl=security&action=registerForm">S'INSCRIRE</a>
                                <?php endif; ?>
                                 <a href="index.php?ctrl=forum&action=listUser">Liste des utilisateurs</a> -->
                            </div>
                        </nav>
                </header> 

            <div id="accueil">
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
            </div>
            

            <?php foreach ($categories as $category): ?>
    <p><?= $category->getName() ?></p>
<?php endforeach; ?>

        
 </body>


<!-- <p>

    <a href="index.php?ctrl=security&action=loginForm">Se connecter</a>
    <a href="index.php?ctrl=security&action=registerForm">S'inscrire</a>
</p> -->