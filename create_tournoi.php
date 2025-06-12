<?php
session_start();
include "utilities.php";

if ($_SESSION['role'] !== 'admin') {
    header('location: index.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $type = $_POST['type'];
    $joueurs = $_POST['joueurs'];

    $stmt = $bdd->prepare("INSERT INTO tournoi (nom, type) VALUES (?, ?)");
    $stmt->execute([$nom, $type]);
    $idTournoi = $bdd->lastInsertId();

    $stmt = $bdd->prepare("INSERT INTO tournoi_joueurs (id_tournoi, id_user) VALUES (?, ?)");
    foreach ($joueurs as $id_user) {
        $stmt->execute([$idTournoi, $id_user]);
    }

    shuffle($joueurs);
    $round = 1;

    for ($i = 0; $i < count($joueurs); $i += 2) {
        $p1 = $joueurs[$i];
        $p2 = $joueurs[$i + 1] ?? null;

        $stmt = $bdd->prepare("INSERT INTO matchs (id_tournoi, round, player1_id, player2_id) VALUES (?, ?, ?, ?)");
        $stmt->execute([$idTournoi, $round, $p1, $p2]);
    }

    header("Location: tournoi.php?id=$idTournoi&round=1");
    exit;
}
