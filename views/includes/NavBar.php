<?php
if (isset($_SESSION['user'])) { ?>
    <div class="nav-container">
        <nav class="navbar bg-dark">
            <a class="navbar-brand" href="http://localhost/movies-system/gestion-films">
                <span class="spn"><strong>Movies system</strong></span>
            </a>
            <?php if ($_SESSION['user']->role === 'Administrateur') { ?>
                <a class="nav-item nav-link" href="http://localhost/movies-system/gestion-films">
                    <span class="spn">Gestion des Films</span>
                </a>
                <a class="nav-item nav-link" href="http://localhost/movies-system/gestion-utilisateurs">
                    <span class="spn">Gestion des utilisateurs </span>
                </a>
            <?php } ?>
            <div class="ml-auto d-flex justify-content-between">
                <a class="nav-item nav-link" href="http://localhost/movies-system/utilisateur-profile">
                    <span class="spn"><?php echo $_SESSION['user']->login; ?></span>
                </a>
                <a class="nav-item nav-link" href="http://localhost/movies-system/utilisateur-logout">
                    <span class="spn">Déconnexion</span>
                </a>
            </div>
        </nav>
    </div>
<?php } else { ?>
    <div class="nav-container">
        <nav class="navbar bg-dark">
            <!-- <a class="navbar-brand" href="http://localhost/movies-system/visiteur-films"> -->
            <a class="navbar-brand" href="#">
                <span class="spn"><strong>Movies system</strong></span>
            </a>
            <!-- <a class="nav-item nav-link" href="http://localhost/movies-system/visiteur-films"> -->
            <a class="nav-item nav-link" href="#">
                <span class="spn">Films</span>
            </a>
            <div class="ml-auto d-flex justify-content-between">
                <a class="nav-item nav-link" href="http://localhost/movies-system/utilisateur-login">
                    <span class="spn">Connexion</span>
                </a>
            </div>
        </nav>
    </div>
<?php } ?>