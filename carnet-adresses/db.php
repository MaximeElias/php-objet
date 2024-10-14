<?php

// Configuration de la connexion à la base de données
$host = 'localhost';         // Adresse du serveur
$dbname = 'carnet_adresses'; // Nom de la base de données
$username = 'root';          // Nom d'utilisateur (par défaut pour XAMPP/WAMP)
$password = '';              // Mot de passe (par défaut pour XAMPP/WAMP)

try {
    // Création d'une nouvelle connexion PDO
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    
    // Configurer le mode d'erreur de PDO pour qu'il lève une exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Optionnel : Vous pouvez définir le mode de récupération de PDO
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Affichage d'un message d'erreur si la connexion échoue
    echo "Connection failed: " . $e->getMessage();
}

?>