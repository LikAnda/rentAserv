<?php
include "database.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') { // vérifier si le formulaire avec la method post a été soumis
    if ((isset($_POST['username']) && (isset($_POST['password'])))) { // vérifier si les données du formulaire existe
        $username = $_POST['username'];
        $password = $_POST['password'];

        //vérifier le compte el se connecter

        header("Location: {$_SERVER['REQUEST_URI']}", true, 303); // utilisation de header() pour rediriger sur la page actuelle avec le code de status HTTP 303
        exit(); // termine le script
    }
}

if ((isset($_POST['re-username']) && (isset($_POST['re-last-name']) && (isset($_POST['re-first-name'])) && (isset($_POST['re-password']))))) { // vérifier si les données du formulaire existe
    $id = create_id($bdd, 'utilisateurs');
    $username = $_POST['re-username'];
    $last_name = strtoupper($_POST['re-last-name']); // mettre le nom en majuscules
    $first_name = $_POST['re-first-name'];
    $password = $_POST['re-password'];

    $requete = "INSERT INTO `utilisateurs` (`id`, `Username`, `Password`, `Nom`, `Prenom`) VALUES ('".$id."', '".$username."', '".$last_name."', '".$first_name."', '".$last_name."')";
    $bdd->exec($requete);

    header("Location: {$_SERVER['REQUEST_URI']}", true, 303); // utilisation de header() pour rediriger sur la page actuelle avec le code de status HTTP 303
    exit(); // termine le script
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>rentAserv</title>
    <link href="style/style.css" rel="stylesheet" />
</head>
<body>
    <header class="header">
        <div class="left-section">
            <h2><a href="index.php">Accueil</a></h2>
            <h2><a href="offers.php">Offres</a></h2>
            <h2><a href="myserv.php">Mes Serveurs</a></h2>
        </div>
        <div class="right-section">
            <h2 id="onclick"><a href="user.php">Utilisateur</a></h2>
        </div>
    </header>

    <h2>Pas encore de compte ?</h2>
    <div class="contain-center">
        <a class="button center-button" href="login.php">Login</a>
        <a class="button center-button" href="register.php">Register</a>
    </div>
</body>
</html>