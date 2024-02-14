<?php

function create_id($bdd, string $table) {
    $nb_user_with_id = 10;
    while ($nb_user_with_id>0) { // tant que au moins un utilisateur à l'id générer une nouvelle id
        $new_id = rand(10000, 99999); // générer une id pour la primary key de 'id' de la bdd
        $requete_check_id = $bdd->query('SELECT COUNT(*) FROM `'.$table.'` WHERE `id` = '.$new_id); // vérifier si la pk n'existe pas déjà
        $nb_user_with_id = $requete_check_id->fetch()[0]; // nombre d'utilisateur avec l'id
    }
    return $new_id;
}

try {
    $bdd = new PDO('mysql:host=localhost;dbname=rentaserv;charset=utf8', 'root', 'root');
}
catch(Exception $e) {
    die('Erreur : '.$e->getMessage());
}