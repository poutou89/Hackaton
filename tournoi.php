<?php
session_start();
include "utilities.php";

if (!isset($_SESSION['role']) !== 'admin') {
    header('location: index.php');
    exit;
}

$round = $_POST['round'] ?? $_GET['round'] ?? 1;

if ($round == 1 && isset($_POST['players'])) {
    $_SESSION['tournament_players'] = $_POST['players'];
}

$player_ids = $_SESSION['tournament_players'] ?? [];

if (empty($player_ids)) {
    echo "Aucun joueur sélectionné.";
    exit;
}

$in = implode(',', array_fill(0, count($player_ids), '?'));
$stmt = $bdd->prepare("SELECT id_user, pseudo FROM user WHERE id_user IN ($in)");
$stmt->execute($player_ids);
$players = $stmt->fetchAll(PDO::FETCH_ASSOC);

function generateMatches($players)
{
    shuffle($players);
    $matches = [];
    for ($i = 0; $i < count($players); $i += 2) {
        $p2 = $players[$i + 1] ?? ['id_user' => null, 'pseudo' => 'BYE'];
        $matches[] = [$players[$i], $p2];
    }
    return $matches;
}

echo "<h2>Tour $round</h2>";
$matches = generateMatches($players);

foreach ($matches as $i => $match) {
    echo "<form method='POST' action='enregistrer_resultat.php'>";
    echo "{$match[0]['pseudo']} vs {$match[1]['pseudo']}<br>";

    if ($match[1]['pseudo'] === 'BYE') {
        echo "<input type='hidden' name='auto_win' value='1'>";
        echo "<input type='hidden' name='winner_id' value='{$match[0]['id_user']}'>";
    } else {
        echo "<input type='number' name='score1' required> - ";
        echo "<input type='number' name='score2' required><br>";
        echo "<input type='hidden' name='score_form' value='1'>";
    }

    echo "<input type='hidden' name='player1_id' value='{$match[0]['id_user']}'>";
    echo "<input type='hidden' name='player2_id' value='{$match[1]['id_user']}'>";
    echo "<input type='hidden' name='round' value='$round'>";
    echo "<input type='submit' value='Valider'>";
    echo "</form><hr>";
}
