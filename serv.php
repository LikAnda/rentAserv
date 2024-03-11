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
            <h2 class="nav-item"><a href="offers.php">Offres</a></h2>
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

    <?php
    if(isset($_GET['id'])) {
        $requete = "SELECT * FROM `serveurs` WHERE `id` = ".$_GET['id']."";
        $response = $bdd -> query($requete);
        $donnees = $response->fetch();
        if ($donnees) {
            echo "<div class='wrapper'>";
            echo "<h2 class='wrapper-title'>".$donnees['nom']."</h2>";
            echo "<h3 class='wrapper-content'>ID du serveur : ".$donnees['id']."</h3>";
            echo "<h3 class='wrapper-content'>Marque : ".$donnees['marque']."</h3>";
            echo "<h3 class='wrapper-content'>Système d'exploitation : ".$donnees['operating_system']."</h3>";
            echo "<h3 class='wrapper-content'>Processeur : ".$donnees['processeur']."</h3>";
            echo "<h3 class='wrapper-content'>Mémoire vive (RAM) : ".$donnees['RAM']."Go</h3>";
            echo "<h3 class='wrapper-content'>Stockage : ".$donnees['stockage']."Go</h3>";
            echo "<h3 class='wrapper-content'>Mémoire vive (RAM) : ".$donnees['RAM']."</h3>";
            if ($donnees['owner']) {
                echo "<h3 class='wrapper-content'>ID du propriétaire : ".$donnees['owner']."</h3>";
            } else {
                echo "<h3 class='wrapper-price'>Prix: ".$donnees['prix']."€ par mois</h3>";
                echo "</div>";

                echo "<div class='contain-center'>";
                echo "<form action='myserv.php' method='POST'>";
                echo "<input type='hidden' id='rentserv-id' name='rentserv-id' value='".$donnees['id']."'>";
                echo "<input class='button' type='Submit' value='Louer'>";
                echo "</form>";
                echo "</div>";
            }
        } else {
            echo <<< HTML
            <div class='wrapper'>
                <h2 class='wrapper-title'>Ce serveur n'existe pas</h2>
            </div>
            HTML;
        }
    } else {
        echo <<< HTML
        <div class='wrapper'>
            <h2 class='wrapper-title'>Aucun serveur spécifié...</h2>
        </div>
        HTML;
    }
    ?>
</body>
</html>