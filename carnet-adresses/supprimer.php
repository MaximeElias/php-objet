<?php
// Inclure le fichier de connexion à la base de données
include 'db.php';

// Vérifier si l'ID du contact est passé dans l'URL
if (isset($_GET['id'])) {
    $id = (int)$_GET['id']; // Convertir l'ID en entier pour éviter les injections SQL

    // Requête pour récupérer les détails du contact à supprimer
    $sql = "SELECT * FROM contacts WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    $contact = $stmt->fetch();

    // Vérifier si le contact existe
    if (!$contact) {
        echo "Contact introuvable.";
        exit();
    }
} else {
    echo "Aucun ID de contact spécifié.";
    exit();
}

// Vérifier si le formulaire a été soumis pour supprimer le contact
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Préparer la requête SQL pour supprimer le contact
    $sql = "DELETE FROM contacts WHERE id = ?";
    $stmt = $conn->prepare($sql);

    // Exécuter la requête avec l'ID fourni
    if ($stmt->execute([$id])) {
        // Rediriger vers la page d'accueil après la suppression
        header("Location: index.php");
        exit();
    } else {
        echo "Erreur lors de la suppression du contact.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer un contact</title>
    <link rel="stylesheet" href="styles.css"> <!-- Lien vers le fichier CSS -->
</head>
<body>
    <h1>Supprimer le contact</h1>

    <p>Êtes-vous sûr de vouloir supprimer le contact suivant ?</p>
    <p><strong>Nom :</strong> <?= htmlspecialchars($contact['nom']); ?></p>
    <p><strong>Prénom :</strong> <?= htmlspecialchars($contact['prenom']); ?></p>
    <p><strong>Email :</strong> <?= htmlspecialchars($contact['email']); ?></p>
    <p><strong>Téléphone :</strong> <?= htmlspecialchars($contact['telephone']); ?></p>
    <p><strong>Adresse :</strong> <?= htmlspecialchars($contact['adresse']); ?></p>

    <form action="supprimer.php?id=<?= $id; ?>" method="post">
        <button type="submit">Confirmer la suppression</button>
        <a href="index.php">Annuler</a>
    </form>
</body>
</html>