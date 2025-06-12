<?php
session_start();
include "utilities.php";

if (!isset($_SESSION['role']) !== 'admin') {
    header('location: index.php');
    exit;
}

$round = $_POST['round'];
$next_round = $round + 1;

if (!isset($_SESSION['next_round_players'])) {
    $_SESSION['next_round_players'] = [];
}

if (!isset($_SESSION['match_count'])) {
    $_SESSION['match_count'] = 0;
}

if (isset($_POST['auto_win'])) {
    $_SESSION['next_round_players'][] = $_POST['winner_id'];
} else {
    $player1 = $_POST['player1_id'];
    $player2 = $_POST['player2_id'];
    $score1 = $_POST['score1'];
    $score2 = $_POST['score2'];

    $stmt = $bdd->prepare("INSERT INTO matchs (player1_id, player2_id, score1, score2, round) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$player1, $player2, $score1, $score2, $round]);

    $winner_id = ($score1 > $score2) ? $player1 : $player2;
    $_SESSION['next_round_players'][] = $winner_id;
}

$_SESSION['match_count']++;
if (!isset($_SESSION['tournament_players']) || !is_array($_SESSION['tournament_players'])) {
    echo "Erreur : liste des joueurs non trouvée.";
    session_destroy();
    exit;
}

if (count($_SESSION['next_round_players']) >= ceil(count($_SESSION['tournament_players']) / 2)) {
    $_SESSION['tournament_players'] = $_SESSION['next_round_players'];
    unset($_SESSION['next_round_players']);
    $_SESSION['match_count'] = 0;

    if (count($_SESSION['tournament_players']) == 1) {
        $stmt = $bdd->prepare("SELECT pseudo FROM user WHERE id_user = ?");
        $stmt->execute([$_SESSION['tournament_players'][0]]);
        $winner = $stmt->fetchColumn();
        echo "<h1>🏆 Le gagnant est : $winner</h1>";
        session_destroy();
        exit;
    }

    header("Location: tournoi.php?round=$next_round");
    exit;
}

header("Location: tournoi.php?round=$round");
exit;
