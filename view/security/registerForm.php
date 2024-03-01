
<div class="registerPage">
    <br>
    <h1>INSCRIPTION</h1>
    <br> 
    <div id="registerForm">
        <form action="index.php?ctrl=security&action=register" method="post">
            <label for="nickname">Pseudo :</label><br>
            <input placeholder="pseudo" type="text" id="nickName" name="nickName" required style="text-align: center;"><br>

            <label for="email">Email :</label><br>
            <input placeholder= email type="email" id="email" name="email" required style="text-align: center;"><br>

            <label for="password">Mot de passe :</label><br>
            <input placeholder="mot de passe" type="password" id="password" name="password" required style="text-align: center;"><br>

            <label for="confirm_password">Confirmer le mot de passe :</label><br>
            <input placeholder="mot de passe" type="password" id="confirm_password" name="confirm_password" required style="text-align: center;"><br>

            <button type="submit">S'inscrire</button>
        </form>
    </div>
</div>
