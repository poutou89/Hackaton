<?php ob_start();
session_start();

$bdd = new PDO('mysql:host=mysql;dbname=Tournois;charset=utf8', 'root', 'root');
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