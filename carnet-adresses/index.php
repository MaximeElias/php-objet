<?php
// Inclure le fichier de connexion à la base de données
include 'db.php';

// Requête pour récupérer tous les contacts de la base de données
$sql = "SELECT * FROM contacts";
$stmt = $conn->prepare($sql);
$stmt->execute();

// Récupérer tous les contacts sous forme de tableau associatif
$contacts = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carnet d'adresses</title>
    <link rel="stylesheet" href="styles.css"> <!-- Lien vers le fichier CSS -->
</head>
<body>
    <h1>Carnet d'adresses</h1>
    
    <a href="ajouter.php">Ajouter un nouveau contact</a>
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Adresse</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($contacts) > 0): ?>
                <?php foreach ($contacts as $contact): ?>
                    <tr>
                        <td><?= htmlspecialchars($contact['id']); ?></td>
                        <td><?= htmlspecialchars($contact['nom']); ?></td>
                        <td><?= htmlspecialchars($contact['prenom']); ?></td>
                        <td><?= htmlspecialchars($contact['email']); ?></td>
                        <td><?= htmlspecialchars($contact['telephone']); ?></td>
                        <td><?= htmlspecialchars($contact['adresse']); ?></td>
                        <td>
                            <a href="modifier.php?id=<?= $contact['id']; ?>">Modifier</a>
                            <a href="supprimer.php?id=<?= $contact['id']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce contact ?');">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7">Aucun contact trouvé.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>