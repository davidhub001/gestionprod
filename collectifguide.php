<?php 
session_start();
include "view.php";
include "header.php";
include "inscription.php";
include "deconnection.php";
?>
<header>
        <h1>Collectif des Guides</h1>
    </header>

    <nav>
        <a href="index.php">Accueil</a>
        <a href="#Produits">Produits</a>
        <a href="collectifguide.php">Guide</a>
        <a href="#Contact">Contact</a>
    </nav>
    <div id="liste_collectif">
    <?php
    // Charger les données depuis le fichier JSON
    $jsonData = json_decode(file_get_contents('http://myhost/GestionProd/data_collectif.json'), true);

    // Boucler à travers les données JSON pour générer des éléments HTML
    foreach ($jsonData as $user) {
        echo '<div class="user-box">';
        echo '<div class="user-image" style="background-image: url(\'' . $user['couverture'] . '\');"></div>';
        echo '<img src="' . $user['photo'] . '" alt="User Photo">';
        echo '<div class="user-info">';
        echo '<h2>' . $user['nom'] . ' ' . $user['prenom'] . '</h2>';
        echo '<p>Email: ' . $user['email'] . '</p>';
        echo '<p>Téléphone: ' . $user['telephone'] . '</p>';
        echo '</div>';
        echo '<button class="connect-btn">Contacter</button>';
        echo '</div>';
    }
    ?>

    </div>
    