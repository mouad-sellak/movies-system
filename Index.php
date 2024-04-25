<?php
include('views/includes/Header.php');
include('Autoload.php');
include('views/includes/NavBar.php');
$gestionPages = [
    'gestion-films', 'film-create', 'film-details', 'film-delete', 'film-update',
    'gestion-utilisateurs', 'utilisateur-create', 'utilisateur-delete', 'utilisateur-profile', 'utilisateur-change-password', 'utilisateur-logout',
    'gestion-panier', 'panier-add', 'panier-remove', 'panier-update',
    'visiteur-films',
    'film-details',
    'utilisateur-login',
];
$visiteurPages = [
    'visiteur-films',
    'film-details',
    'utilisateur-login',
    'add-card'
];
if (isset($_SESSION['logged']) && $_SESSION['logged'] == "true") {
    if (isset($_GET['page'])) {
        if (in_array($_GET['page'], $gestionPages)) {
            include('views/' . $_GET['page'] . '.php');
        } else {
            include('views/includes/404.php');
        }
    }
} elseif (isset($_GET['page'])) {
    if (in_array($_GET['page'], $visiteurPages)) {
        include('views/' . $_GET['page'] . '.php');
    } else {
        include('views/includes/404.php');
    }
} else {
    include('views/visiteur-films.php');
}
include('views/includes/Footer.php');

