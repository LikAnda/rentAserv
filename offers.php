<?php
include "database.php";
session_start();

if (isset($_POST['terminateserv-id'])) {
    $serv_id = $_POST['terminateserv-id'];

    $requete = "UPDATE serveurs SET owner = NULL WHERE id = ?";
    $donnees = $bdd->prepare($requete);
    $donnees->execute(array($_POST['terminateserv-id']));


    header("Location: {$_SERVER['REQUEST_URI']}?terminate=true", true, 303);
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
        if (urlParams.get("terminate") === "true") {
            alert("Résiliation réussie");
        }
    }
    </script>
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
        $requete = "SELECT s.id, s.prix, s.nom, s.marque, s.processeur, s.RAM, s.stockage, os.Nom AS operating_system, s.icon FROM serveurs s LEFT JOIN operating_systems os ON s.operating_system = os.id WHERE s.owner IS NULL";
        $response = $bdd -> query($requete);
        while ($donnees = $response->fetch()) {
            echo '<div class="card" onclick="submitForm()">';
            echo '<form id="cardForm" action="serv.php" method="GET">';

            echo '<h2 class="card-title">'.$donnees['nom'].'</h2>';
            echo '<p class="card-content">Marque : '.$donnees['marque'].'</p>';
            echo "<p class='card-content'>Système d'exploitation : ".$donnees['operating_system']."</p>";
            echo '<p class="card-content">Processeur : '.$donnees['processeur'].'</p>';
            echo '<p class="card-content">RAM : '.$donnees['RAM'].'Go</p>';
            echo '<p class="card-content">Stockage : '.$donnees['stockage'].'Go</p>';
            echo '<p class="card-price">'.$donnees['prix'].'€ par mois</p>';

            echo '<button class="card-button center-button" type="submit" id="id" name="id" value="'.$donnees['id'].'">Louer</button>';
            echo '</form>';
            echo '</div>';
        }
        ?>
    </div>

</body>
</html>