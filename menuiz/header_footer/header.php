<header>
    <nav id="nav1" class="navbar navbar-expand-lg bg-secondary">
        <div class="container-fluid">
            <a href="session.php" class="navbar-brand">Menuiz</a>
            <a id="ntm" class="nav-link" href="panier.php" role="button" aria-controls="panierCanva"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                    <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                </svg></a>
        </div>
    </nav>
    <nav id="nav2" class="navbar navbar-expand-lg bg-primary">
        <div class="test">
            <a id="userbar" class="nav-link" href="deconnexion.php">Se déconnecter</a>
            <a id="userbar" class="nav-link disabled"><?php echo 'Utilisateur : ' . $_SESSION["prenom_nom"]; ?> </a>
        </div>
    </nav>
</header>

<!-- OFFCANVAS -->

<!-- <div class="offcanvas offcanvas-start" tabindex="-1" id="panierCanva" aria-labelledby="panierCanvaLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="panierCanvaLabel">Mon Panier</h5>
        <button class="btn-close" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        
        include 'panier.php'; 
    </div>
    <div> -->