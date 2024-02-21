<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>rentAserv</title>
    <link href="style/loginform.css" rel="stylesheet" />
</head>
<body>
    <div class="wrapper">
        <h2>Connexion</h2>
        <form action="user.php" method="POST">
            <div class="input-box">
                <input type="text" name="username" id="username" placeholder="Entrer votre pseudo" required>
            </div>
            <div class="input-box">
                <input type="password" name="password" id="password" placeholder="Entrer votre mot de passe" required>
            </div>
            <div class="input-box button">
                <input type="Submit" value="Se connecter">
            </div>
            <div class="text">
                <h3>Vous n'avez pas de compte ? <a href="register.php">Register</a></h3>
            </div>
        </form>
    </div>
</body>
</html>