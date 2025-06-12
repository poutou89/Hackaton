<?php
session_start();
include "utilities.php";

$id_Tournoi = $_GET['id'];

// Récupérer tous les matchs de ce tournoi
$RequestTournoi = $bdd->prepare('
    SELECT 
        m.round, 
        m.player1_id, m.player2_id, 
        m.score1, m.score2, 
        m.gagnant_id,
        u1.pseudo AS joueur1,
        u2.pseudo AS joueur2,
        u3.pseudo AS gagnant
    FROM matchs m
    LEFT JOIN user u1 ON m.player1_id = u1.id_user
    LEFT JOIN user u2 ON m.player2_id = u2.id_user
    LEFT JOIN user u3 ON m.gagnant_id = u3.id_user
    WHERE m.id_tournoi = ?
    ORDER BY m.round ASC, m.id_match ASC
');
$RequestTournoi->execute([$id_Tournoi]);
$matchs = $RequestTournoi->fetchAll();

$rounds = [];
foreach ($matchs as $match) {
    $rounds[$match['round']][] = $match;
}

$gagnantFinal = end($matchs)['gagnant'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tournoi #<?= htmlspecialchars($id_Tournoi) ?></title>
</head>
<body>
    <?php include('header.php'); ?>

    <main class="container">
        <h1>Tournoi n°<?= htmlspecialchars($id_Tournoi) ?></h1>

        <?php foreach ($rounds as $roundNumber => $matchsDuRound): ?>
            <section>
                <h2>Round <?= $roundNumber ?></h2>
                <ul>
                    <?php foreach ($matchsDuRound as $match): ?>
                        <li>
                            <?= htmlspecialchars($match['joueur1'] ?? 'Inconnu') ?> 
                            (<?= $match['score1'] ?>) 
                            vs 
                            <?= htmlspecialchars($match['joueur2'] ?? 'Inconnu') ?> 
                            (<?= $match['score2'] ?>) 
                            → Gagnant : <strong><?= htmlspecialchars($match['gagnant'] ?? 'Indéfini') ?></strong>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </section>
        <?php endforeach; ?>

        <h2> Gagnant du tournoi :</h2>
        <p style="font-size: 1.5em; font-weight: bold;">
            <?= htmlspecialchars($gagnantFinal ?? 'Non déterminé') ?>
        </p>
    </main>
</body>
</html>