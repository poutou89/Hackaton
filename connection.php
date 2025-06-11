<?php ob_start();
include('utilities.php');

if (!empty($_POST['pseudo']) && !empty($_POST['mdp'])) {
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mdp = htmlspecialchars($_POST['mdp']);

    $requestcreate = $bdd->prepare("SELECT id_user,pseudo,mdp,role 
                                    FROM user 
                                    WHERE pseudo = ?");
    $requestcreate->execute(array($pseudo));
    $data = $requestcreate->fetch();
    if (password_verify($mdp, $data['mdp'])) {
        $_SESSION['user'] = ['id_user' => $data['id_user'], 'pseudo' => $data['pseudo'], 'role' => $data['role']];
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
</head>

<body>
    <?php include('header.php'); ?>
</body>

</html>