<?php session_start() ?>
<?php
include "utilities.php";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <?php
    include "header.php";
    ?>
    <div class="container">
        <a href="index.php">Retour à la page d'accueil</a>
        <h1>INSCRIPTION</h1>
    </div>

    <div class="container">
        <form action="inscription.php" method="post" required enctype="multipart/form-data">
            <input type="text" name="pseudo" placeholder="Pseudo" required>
            <input type="text" name="mdp" placeholder="Mot de passe" required>
            <button class="btn">Valider mon inscription</button>
    </div>

    <?php if (!empty($_POST['pseudo']) && !empty($_POST['mdp'])) {
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mdp = htmlspecialchars(sha1(sha1($_POST['mdp']) . 'erqbf8295'));
        $role = 'joueur';

        $requestCreate = $bdd->prepare('INSERT INTO user(pseudo,mdp,role)
                                            VALUES (:pseudo,:mdp,:role)');

        $requestCreate->execute([
            'pseudo' => $pseudo,
            'mdp' => $mdp,
            'role' => $role
        ]);
        header("Location:index.php");
    }
    ?>
    </form>
</body>

</html>