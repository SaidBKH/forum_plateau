<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $meta_description ?>">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tiny.cloud/1/zg3mwraazn1b2ezih16je1tc6z7gwp5yd4pod06ae5uai8pa/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    <link rel="stylesheet" href="<?= PUBLIC_DIR ?>/css/style.css">
    <title>AutoTalk - L</title>
</head>
<body>
    <div id="wrapper">
        <header>
            <nav>
                <div id="nav-left">
                   
                    <a href="index.php">ACCUEIL</a>
                    <a href="index.php?ctrl=forum&action=listCategory">CATÉGORIES</a>
                    <a href="index.php?ctrl=forum&action=latestNews">ACTUALITÉS</a>
                </div>
                <div class = "logo">
                <a href="index.php">
                        <img src="<?= PUBLIC_DIR ?>/img/logo.png" alt="Logo du forum" id="forum-logo" >
                    </a>
                </div>
                
                <div id="nav-right">
                    <?php if(App\Session::getUser()): ?>
                        <a href="index.php?ctrl=user&action=profile">
                            <span class="fas fa-user"></span>&nbsp;<?= App\Session::getUser()->getNickName() ?>
                        </a>
                        <a href="index.php?ctrl=security&action=logout">Déconnexion</a>
                    <?php else: ?>
                        <a href="index.php?ctrl=security&action=loginForm">SE CONNECTER</a>
                        <a href="index.php?ctrl=security&action=registerForm">S'INSCRIRE</a>
                    <?php endif; ?>
                </div>
            </nav>
        </header>

        <main id="forum">
            <?= $page ?>
        </main>

        <footer>
            <div class="footer">
                <p>&copy; <?= date_create("now")->format("Y") ?> - <a href="#">Règlement du forum</a> - <a href="#">Mentions légales</a></p>
            </div>
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $(".message").each(function(){
                if($(this).text().length > 0){
                    $(this).slideDown(500, function(){
                        $(this).delay(3000).slideUp(500)
                    });
                }
            });
            $(".delete-btn").on("click", function(){
                return confirm("Êtes-vous sûr de vouloir supprimer?");
            });
            tinymce.init({
                selector: '.post',
                menubar: false,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table paste code help wordcount'
                ],
                toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
                content_css: '//www.tiny.cloud/css/codepen.min.css'
            });
        });
    </script>
    <script src="<?= PUBLIC_DIR ?>/js/script.js"></script>
</body>
</html>
