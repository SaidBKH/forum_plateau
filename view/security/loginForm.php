



<div class="loginPage">
    <br>
    <h1>VEUILLEZ VOUS CONNECTER AVANT D'ACCEDER AU FORUM</h1>
    <br>
        <div id="loginForm">
            <form action="index.php?ctrl=security&action=login" method="post">
                <label for="email"></label><br>
                <input placeholder ="mail" type="email" id="email" name="email" required style="text-align: center;"><br>
                <label for="password"></label><br>    
                <input placeholder = "mot de passe " type="password" id="password" name="password" required style="text-align: center;"><br>
            <button type="submit">Se connecter</button>
        </form>
    </div>
    <br>
<p>Je n'ai pas encore de compte </p>
    <div class="registerButton">
     <button name="register"> <a href="index.php?ctrl=security&action=registerForm">JE M'INSCRIS </button>
     </div>
</div>


