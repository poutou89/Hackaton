<?php
include "utilities.php";

$idTournoi = $_POST['id_tournoi'];
$round = $_POST['round'];
$scores = $_POST['scores'];

$nextRoundPlayers = [];



foreach ($scores as $id_match => $data) {
    $score1 = (int)$data['score1'];
    $score2 = (int)$data['score2'];
    $p1 = $data['player1_id'];
    $p2 = $data['player2_id'];

    $gagnant = $score1 > $score2 ? $p1 : $p2;
    $nextRoundPlayers[] = $gagnant;

    $stmt = $bdd->prepare("UPDATE matchs SET score1=?, score2=?, gagnant_id=? WHERE id_match=?");
    $stmt->execute([$score1, $score2, $gagnant, $id_match]);
}

// Générer le prochain round si au moins 2 gagnants
if (count($nextRoundPlayers) >= 2) {
    $nextRound = $round + 1;
    for ($i = 0; $i < count($nextRoundPlayers); $i += 2) {
        $p1 = $nextRoundPlayers[$i];
        $p2 = $nextRoundPlayers[$i + 1] ?? null;

        $stmt = $bdd->prepare("INSERT INTO matchs (id_tournoi, round, player1_id, player2_id) VALUES (?, ?, ?, ?)");
        $stmt->execute([$idTournoi, $nextRound, $p1, $p2]);
    }

    header("Location: tournoi.php?id=$idTournoi&round=$nextRound");
} else {

    $stmt2 = $bdd->prepare("
    SELECT *, matchs.gagnant_id
    FROM user
    INNER JOIN matchs ON user.id_user = matchs.gagnant_id
                            ");
    $stmt2->execute();
    $winner = $stmt2->fetch();
    
    echo "<h2>Le gagnant du tournoi est le joueur :" . $winner['pseudo'] ."</h2>";
}
exit;