<?php
// Inclure le fichier de connexion à la base de données
include 'db.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $telephone = htmlspecialchars($_POST['telephone']);
    $adresse = htmlspecialchars($_POST['adresse']);

    // Préparer la requête SQL pour insérer le nouveau contact
    $sql = "INSERT INTO contacts (nom, prenom, email, telephone, adresse) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Exécuter la requête avec les valeurs fournies
    if ($stmt->execute([$nom, $prenom, $email, $telephone, $adresse])) {
        // Rediriger vers la page d'accueil après l'ajout
        header("Location: index.php");
        exit();
    } else {
        echo "Erreur lors de l'ajout du contact.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un contact</title>
    <link rel="stylesheet" href="styles.css"> <!-- Lien vers le fichier CSS -->
</head>
<body>
    <h1>Ajouter un nouveau contact</h1>

    <form action="ajouter.php" method="post">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required>

        <label for="telephone">Téléphone :</label>
        <input type="text" id="telephone" name="telephone">

        <label for="adresse">Adresse :</label>
        <textarea id="adresse" name="adresse"></textarea>

        <button type="submit">Ajouter</button>
        <a href="index.php">Annuler</a>
    </form>
</body>
</html>