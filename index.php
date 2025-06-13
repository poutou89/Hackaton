<?php session_start() ?>
<?php include 'utilities.php' ?>
<?php 
    $requestTournoi = $bdd->query('SELECT * FROM tournoi');
    $Tournoi = $requestTournoi->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil tournoi</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <?php include('header.php'); ?>

    
    <main>
        <div class="container">
            <?php if (isset($_SESSION['id_user'])) {
            echo '<h2>bienvenue ' . $_SESSION['pseudo'] . '</h2>';
            }
            ?>
            <h1>Historique des tournois :</h1>
                <?php foreach ($Tournoi as $data): ?>
                    <p><a href="classement.php?id=<?php echo $data['id_tournoi']?>"><?php echo $data['nom'] ?></a></p>
                <?php endforeach ?>
        </div>
    </main>
</body>

</html>