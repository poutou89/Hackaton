<?php
session_start();
require_once "utilities.php"; // Connexion PDO

if ($_SESSION['role'] != 'admin') {
    header('location: index.php');
}


// Récupérer les utilisateurs depuis la base de données
$stmt = $bdd->query("SELECT id_user, pseudo FROM user");
$joueurs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Créer un nouveau tournoi</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <? include "header.php"; ?>
    <div class="container">
        <h1 class="center">Créer un nouveau tournoi</h1>

        <form action="create_tournoi.php" method="post">
            <label for="nom">Nom du tournoi :</label><br>
            <input type="text" name="nom" id="nom" required><br><br>

            <label for="type">Type de tournoi :</label><br>
            <select name="type" id="type">
                <option value="knockout">Élimination directe (Knockout)</option>
                <option value="round-robin">Tous contre tous (Round Robin)</option>
            </select><br><br>

            <label>Choisissez les joueurs :</label><br>
            <?php foreach ($joueurs as $joueur): ?>
                <div class="container list">
                <input type="checkbox" name="joueurs[]" value="<?= $joueur['id_user'] ?>">
                <?= htmlspecialchars($joueur['pseudo']) ?></div><br>
            <?php endforeach; ?>
            <br>

            <input class="btn" type="submit" value="Créer le tournoi">
        </form>
    </div>
</body>

</html>