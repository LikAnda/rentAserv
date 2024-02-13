<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>rentAserv</title>
    <link href="style/loginform.css" rel="stylesheet" />
</head>
<body>
    <div class="wrapper">
        <h2>Créer un compte</h2>
        <form action="user.php" method="POST">
            <div class="input-box">
                <input type="text" name="re-username" id="re-username" placeholder="Entrer votre pseudo" required>
            </div>
            <div class="input-box">
                <input type="text" name="re-last-name" id="re-last-name" placeholder="Entrer votre nom" required>
            </div>
            <div class="input-box">
                <input type="text" name="re-first-name" id="re-first-name" placeholder="Entrer votre prénom" required>
            </div>
            <div class="input-box">
                <input type="password" name="re-password" id="re-password" placeholder="Entrer un mot de passe" required>
            </div>
            <div class="input-box button">
                <input type="Submit" value="S'enregistrer">
            </div>
            <div class="text">
                <h3>Vous avez déjà un compte ? <a href="login.php">Login</a></h3>
            </div>
        </form>
    </div>
</body>
</html>