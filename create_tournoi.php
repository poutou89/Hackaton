<?php
include "utilities.php";

if (!isset($_POST['joueurs'])) {
    echo "<form method='POST'>";
    echo "<label>Nombre de joueurs : </label>";
    echo "<input type='number' name='joueurs' min='2' required>";
    echo "<input type='submit' value='Suivant'>";
    echo "</form>";
    exit;
}

$nombre = (int)$_POST['joueurs'];

$stmt = $bdd->query("SELECT id_user, pseudo FROM user WHERE role = 'joueur'");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<form method='POST' action='tournoi.php'>";
echo "<input type='hidden' name='round' value='1'>";
echo "<input type='hidden' name='nombre' value='$nombre'>";
echo "<h3>Sélectionne $nombre joueurs :</h3>";

foreach ($users as $user) {
    echo "<input type='checkbox' name='players[]' value='{$user['id_user']}'> {$user['pseudo']}<br>";
}

echo "<br><input type='submit' value='Lancer le tournoi'>";
echo "</form>";