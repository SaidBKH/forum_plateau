
<h1>Inscription</h1>
    

    <form action="index.php?ctrl=security&action=register" method="post">
        <label for="nickname">Pseudo :</label><br>
        <input type="text" id="nickName" name="nickName" required><br>

        <label for="email">Email :</label><br>
        <input type="email" id="email" name="email" required><br>

        <label for="password">Mot de passe :</label><br>
        <input type="password" id="password" name="password" required><br>

        <label for="confirm_password">Confirmer le mot de passe :</label><br>
        <input type="password" id="confirm_password" name="confirm_password" required><br>

        <button type="submit">S'inscrire</button>
    </form>