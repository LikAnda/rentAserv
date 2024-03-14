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
            <h2 id="onclick" class="nav-item"><a href="index.php">Accueil</a></h2>
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
    
    <div class="main-content">
        <h1>Bienvenue sur rentAserv</h1>
        <p class="text"><b>rentAserv</b> est une plateforme de location de serveurs dédiés. Que vous ayez besoin d'un serveur pour héberger un site web, exécuter des applications ou effectuer des calculs intensifs, nous avons ce qu'il vous faut.<br>Nos serveurs sont puissants, fiables et flexibles, et notre équipe est là pour vous aider à trouver la solution la mieux adaptée à vos besoins.</p>
        <p class="text">Parcourez nos offres et trouvez le serveur parfait pour votre projet. Louez dès aujourd'hui et bénéficiez d'une infrastructure de qualité professionnelle à un prix abordable.</p>
    </div>
    <br>
    <div class="center">
        <h3>Repo GitHub : <a href="https://github.com/LikAnda/rentAserv" target="_blank">https://github.com/LikAnda/rentAserv</a></h3>
        <img class="center" src="db-schem.png" alt="Image" height="600" width="800">
    </div>

</body>
</html>