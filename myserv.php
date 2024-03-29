<?php
include "database.php";
session_start();

if (isset($_POST['rentserv-id'])) {
    $serv_id = $_POST['rentserv-id'];

    $requete = "UPDATE serveurs SET owner = ? WHERE id = ?";
    $donnees = $bdd->prepare($requete);
    $donnees->execute([$_SESSION['user_id'], $_POST['rentserv-id']]);
    header("Location: {$_SERVER['REQUEST_URI']}?rent=true", true, 303);
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>rentAserv</title>
    <link href="style/style.css" rel="stylesheet"/>
    <script>
    window.onload = function() {
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get("rent") === "true") {
            alert("Location réussie");
        }
    }
    </script>
</head>
<body>
    <header class="header">
        <div class="left-section">
            <h2 class="nav-item"><a href="index.php">Accueil</a></h2>
            <h2 class="nav-item"><a href="offers.php">Offres</a></h2>
            <h2 id="onclick" class="nav-item"><a href="myserv.php">Mes Serveurs</a></h2>
        </div>
        <div class="right-section">
            <?php
            if(isset($_SESSION['user_id'])) {
                echo "<h2 class='nav-item'><a href='user.php'>".$_SESSION['username']."</a></h2>";
            } else {
                echo "<h2 class='nav-item'><a href='user.php'>Utilisateur</a></h2>";
            }
            ?>
        </div>
    </header>

    <?php
    if(isset($_SESSION['user_id'])) {
        $requete = "SELECT `id`, `prix`, `nom`, `marque`, `processeur`, `RAM`, `stockage`, `operating_system`, `icon` FROM `serveurs` WHERE `owner` = ".$_SESSION['user_id']."";
        $response = $bdd -> query($requete);
        if($response->rowCount() > 0) {
            while ($donnees = $response->fetch()) {
                echo '<div class="card" onclick="submitForm()">';
                echo "<form action='offers.php' method='POST'>";

                echo '<h2 class="card-title">'.$donnees['nom'].'</h2>';
                echo '<p class="card-content">Marque : '.$donnees['marque'].'</p>';
                echo "<p class='card-content'>Système d'exploittaion : ".$donnees['operating_system']."</p>";
                echo '<p class="card-content">Processeur : '.$donnees['processeur'].'</p>';
                echo '<p class="card-content">RAM : '.$donnees['RAM'].'Go</p>';
                echo '<p class="card-content">Stockage : '.$donnees['stockage'].'Go</p>';
                echo '<p class="card-price">'.$donnees['prix'].'€ par mois</p>';

                echo "<input type='hidden' id='terminateserv-id' name='terminateserv-id' value='".$donnees['id']."'>";
                echo "<input class='card-button center-button' type='Submit' value='Résilier'>";
                echo "</form>";
                echo '</div>';
            }
        } else {
            echo <<< HTML
            <div class='wrapper'>
                <h2 class='wrapper-title'>Vous n'avez pour l'instant aucun serveur</h2>
            </div>
            HTML;
        }

    } else {
        echo <<< HTML
        <div class='wrapper'>
            <h2 class='wrapper-title'>Vous devez être connecté(e)...</h2>
        </div>
        HTML;
    }
    ?>

</body>
</html>