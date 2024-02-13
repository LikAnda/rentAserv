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
        <form action="#">
            <div class="input-box">
                <input type="text" placeholder="Entrer votre pseudo" required>
            </div>
            <div class="input-box">
                <input type="text" placeholder="Entrer votre nom" required>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Entrer votre prénom" required>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Entrer un mot de passe" required>
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