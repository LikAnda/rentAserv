<?php
include "database.php";
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) { // vérifier si les données du formulaire existe
    echo "ISSET USERNAME AND PASSWORD";
    $username = $_POST['username'];
    $password = $_POST['password'];

    //vérifier le compte el se connecter
    $requete = $bdd->prepare("SELECT * FROM `utilisateurs` WHERE `Username` = ? AND `Password` = ?");
    $requete->execute([$username, $password]);
    $user_info = $requete->fetch();
    if ($user_info) { // vérifier si la valeur n'est pas nulle
        $_SESSION['user_id'] = $user_info['id'];
        $_SESSION['username'] = $user_info['Username'];
        $_SESSION['password'] = $user_info['Password'];
        $_SESSION['last_name'] = $user_info['Nom'];
        $_SESSION['first_name'] = $user_info['Prenom'];
        echo "CONNECTER";
    }
    header("Location: {$_SERVER['REQUEST_URI']}", true, 303); // utilisation de header() pour rediriger sur la page actuelle avec le code de status HTTP 303
    exit(); // termine le script
}

if (isset($_POST['re-username']) && isset($_POST['re-password']) && isset($_POST['re-last-name']) && isset($_POST['re-first-name'])) { // vérifier si les données du formulaire existe
    echo "<h1>ISSET REGISTER</h1>";
    $id = create_id($bdd, 'utilisateurs');
    $password = $_POST['re-password'];
    $username = $_POST['re-username'];
    $last_name = strtoupper($_POST['re-last-name']); // mettre le nom en majuscules
    $first_name = $_POST['re-first-name'];

    $requete = "INSERT INTO `utilisateurs` (`id`, `Username`, `Password`, `Nom`, `Prenom`) VALUES ('".$id."', '".$username."', '".$password."', '".$last_name."', '".$first_name."')";
    $bdd->exec($requete);

    $_SESSION['user_id'] = $id;
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    $_SESSION['last_name'] = $last_name;
    $_SESSION['first_name'] = $first_name;

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
            <h2 class="nav-item"><a href="index.php">Accueil</a></h2>
            <h2 class="nav-item"><a href="offers.php">Offres</a></h2>
            <h2 class="nav-item"><a href="myserv.php">Mes Serveurs</a></h2>
        </div>
        <div class="right-section">
            <?php
            if(isset($_SESSION['user_id'])) {
                echo "<h2 id='onclick' class='nav-item'><a href='user.php'>".$_SESSION['username']."</a></h2>";
            } else {
                echo "<h2 id='onclick' class='nav-item'><a href='user.php'>Utilisateur</a></h2>";
            }
            ?>
        </div>
    </header>

    <?php
    if(isset($_SESSION['user_id'])) {
        echo "<div class='wrapper'>";
        echo "<h2 class='wrapper-title'>Données utilisateur</h2>";
        echo "<h3 class='wrapper-content'>ID de l'utilisateur : ".$_SESSION['user_id']."</h3>";
        echo "<h3 class='wrapper-content'>Nom d'utilisateur : ".$_SESSION['username']."</h3>";
        echo "<h3 class='wrapper-content'>Nom : ".$_SESSION['last_name']."</h3>";
        echo "<h3 class='wrapper-content'>Prénom : ".$_SESSION['first_name']."</h3>";
        echo "</div>";

        echo <<< HTML
        <div class="contain-center">
            <form action="logout.php" method="POST">
                <input class="button" type="Submit" value="Se déconnecter">
            </form>
        </div>
        HTML;
    } else {
        echo <<< HTML
        <h2 class='align-center'>Pas encore de compte ?</h2>
        <div class="contain-center">
            <a class="button center-button" href="login.php">Login</a>
            <a class="button center-button" href="register.php">Register</a>
        </div>
        HTML;
    }
    ?>
</body>
</html>