<?php
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
        <div class="card">
            <h2 class="card-title">WebCloud Lite</h2>
            <p class="card-content">Marque : 2CRSI</p>
            <p class="card-content">Processeur : Intel i3</p>
            <p class="card-content">RAM : 16Go</p>
            <p class="card-content">Stockage : 1024Go</p>
            <p class="card-price">12€ par mois</p>
        </div>
        <div class="card">ITEM 2</div>
        <div class="card">ITEM 3</div>
        <div class="card">ITEM 4</div>
        <div class="card">ITEM 5</div>
        <div class="card">ITEM 6</div>
        <div class="card">ITEM 7</div>
    </div>

</body>
</html>