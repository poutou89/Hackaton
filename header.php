<header>
    <div class="logo">
        <img src="" alt="">
    </div>
    <h1></h1>
    <nav>

        <?php if (isset($_SESSION['id_user'])): ?>
            <ul class="menu">
                <li><a href="index.php">Acceuil</a></li>
                <li><a href="deconnection.php">Deconnection</a></li>
                <li><a href="new_tournoi.php">Création de tournois</a></li>
            </ul>

            <ul class="burger-contenue">
                <li><a href="index.php">Acceuil</a></li>
                <li><a href="deconnection.php">Deconnection</a></li>
                <li><a href="new_tournoi.php">Création de tournois</a></li>

            </ul>
        <?php else: ?>
            <ul class="menu">
                <li><a href="index.php">Acceuil</a></li>
                <li><a href="Connection.php">Connection</a></li>
                <li><a href="inscription.php">Inscription</a></li>
            </ul>

            <ul class="burger-contenue">
                <li><a href="index.php">Acceuil</a></li>
                <li><a href="Connection.php">Connection</a></li>
                <li><a href="inscription.php">Inscription</a></li>
            </ul>
            </div>
        <?php endif ?>

    </nav>
</header>