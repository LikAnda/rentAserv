<?php
include "database.php";
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>rentAserv</title>
    <link href="style/style.css" rel="stylesheet"/>
</head>
<body>
    <header class="header">
        <div class="left-section">
            <h2 class="nav-item"><a href="index.php">Accueil</a></h2>
            <h2 id="onclick" class="nav-item"><a href="offers.php">Offres</a></h2>
            <h2 class="nav-item"><a href="myserv.php">Mes Serveurs</a></h2>
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

    <div class="card-container">
        <?php
        $requete = "SELECT `id`, `Prix/Mois`, `nom`, `marque`, `processeur`, `RAM`, `stockage`, `operating_system`, `icon` FROM `serveurs` WHERE `owner` IS NULL";
        $response = $bdd -> query($requete);
        while ($donnees = $response->fetch()) {
            echo '<div class="card" onclick="submitForm()">';
            echo '<form id="cardForm" action="serv.php" method="GET">';

            echo '<h2 class="card-title">'.$donnees['nom'].'</h2>';
            echo '<p class="card-content">Marque : '.$donnees['marque'].'</p>';
            echo '<p class="card-content">Processeur : '.$donnees['processeur'].'</p>';
            echo '<p class="card-content">RAM : '.$donnees['RAM'].'Go</p>';
            echo '<p class="card-content">Stockage : '.$donnees['stockage'].'Go</p>';
            echo '<p class="card-price">'.$donnees['RAM'].'€ par mois</p>';

            echo '<button class="card-button center-button" type="submit" id="id" name="id" value="'.$donnees['id'].'">Louer</button>';
            echo '</form>';
            echo '</div>';
        }
        ?>
    </div>

</body>
</html>