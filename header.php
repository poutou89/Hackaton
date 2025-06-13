<header>
    <div class="logo">
        <img src="assets/img/tournois.png" alt="image de coupe avec texte tournois">
    </div>
    <h1>tournoi</h1>
    <nav>

        <?php if (isset($_SESSION['id_user'])): ?>
            <ul class="" id="navLinks">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="deconnection.php">Deconnexion</a></li>
                <li><a href="new_tournoi.php">Création de tournois</a></li>
            </ul>
        <?php else: ?>
            <ul class="" id="navLinks">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="Connection.php">Connexion</a></li>
                <li><a href="inscription.php">Inscription</a></li>
            </ul>
            </div>
        <?php endif ?>
    </nav>
    <div class="menu">
        <button id="burger" class="menu" aria-label="Ouvrir le menu">
            <img src="assets/img/bars-solid.svg" alt="menu">
        </button>
    </div>
    <script src="script.js"></script>
</header>