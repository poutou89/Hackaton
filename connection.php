<?php session_start();
include "utilities.php";


if (!empty($_POST['pseudo']) && !empty($_POST['mdp'])) {
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mdp = htmlspecialchars(sha1(sha1($_POST['mdp']) . 'erqbf8295'));

    $requestcreate = $bdd->prepare("SELECT id_user,pseudo,mdp,role 
                                    FROM user 
                                    WHERE pseudo = ?");
    $requestcreate->execute(array($pseudo));
    $data = $requestcreate->fetch();
    if ($data && $mdp === $data['mdp']) {
        $_SESSION['pseudo'] = $data['pseudo'];
        $_SESSION['id_user'] = $data['id_user'];
        $_SESSION['role'] = $data['role'];
        header('location:index.php');
    } else {
        echo '<p class="error">Mot de passe ou nom d\'utilisateur incorrect<p>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <?php include "header.php"; ?>
    <h1 class="center">connection</h1>
    <div class="container">
        <form action="connection.php" method="post">
            <label for="pseudo"> Pseudo: </label>
            <input type="text" name="pseudo">
            <label for="mdp">Mot de passe: </label>
            <input type="password" name="mdp">
            <button class="btn">Envoyer</button>
        </form>
    </div>
</body>

</html>