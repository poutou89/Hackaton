<?php
include "utilities.php";

$idTournoi = $_GET['id'] ?? null;
$round = $_GET['round'] ?? 1;

$stmt = $bdd->prepare("
    SELECT m.*, u1.pseudo AS joueur1, u2.pseudo AS joueur2 
    FROM matchs m
    LEFT JOIN user u1 ON m.player1_id = u1.id_user
    LEFT JOIN user u2 ON m.player2_id = u2.id_user
    WHERE m.id_tournoi = ? AND m.round = ?
");
$stmt->execute([$idTournoi, $round]);
$matches = $stmt->fetchAll();

if (!$matches) {
    echo "<p>Aucun match pour ce round.</p>";
    exit;
}
?>

<h2>Round <?= $round ?></h2>
<form action="enregistrer_resultat.php" method="post">
    <input type="hidden" name="id_tournoi" value="<?= $idTournoi ?>">
    <input type="hidden" name="round" value="<?= $round ?>">

    <?php foreach ($matches as $match): ?>
        <div>
            <?= $match['joueur1'] ?> 
            <input type="number" name="scores[<?= $match['id_match'] ?>][score1]" required>
            vs 
            <?= $match['joueur2'] ?> 
            <input type="number" name="scores[<?= $match['id_match'] ?>][score2]" required>

            <input type="hidden" name="scores[<?= $match['id_match'] ?>][player1_id]" value="<?= $match['player1_id'] ?>">
            <input type="hidden" name="scores[<?= $match['id_match'] ?>][player2_id]" value="<?= $match['player2_id'] ?>">
        </div>
    <?php endforeach; ?>

    <button type="submit">Valider tous les scores</button>
</form>