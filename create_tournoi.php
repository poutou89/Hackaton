<?php session_start();
include "utilities.php";

    $stmt = $bdd->query("SELECT id_user, pseudo FROM user");
    $players = $stmt->fetchALL();

   function generateMatches($players, $tournamentType) {
    $matches = [];

    if ($tournamentType === 'round-robin') {
        for ($i = 0; $i < count($players); $i++) {
            for ($j = $i + 1; $j < count($players); $j++) {
                $matches[] = [$players[$i], $players[$j]];
            }
        }
    } elseif ($tournamentType === 'knockout') {
        shuffle($players);
        for ($i = 0; $i < count($players); $i += 2) {
            if (isset($players[$i + 1])) {
                $matches[] = [$players[$i], $players[$i + 1]];
            } else {
                $matches[] = [$players[$i], ['id_user' => null, 'pseudo' => 'BYE']];
            }
        }
    } else {
        throw new Exception("Type de tournoi non pris en charge.");
    }

    return $matches;
}

// Exemple d'utilisation
$tournamentType = 'knockout'; // ou 'knockout'

try {
    $matches = generateMatches($players, $tournamentType);
    foreach ($matches as $match) {
        echo $match[0]['pseudo'] . ' vs ' . $match[1]['pseudo'] . PHP_EOL;
    }
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}
?>