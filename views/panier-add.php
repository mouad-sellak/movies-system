<?php
if (isset($_SESSION['user'])) {
    $card = new CardController();
    if ($card->addToCart() == 'ok') {
        header('location: panier-gestion');
    }else{
        header('location: visiteur-films');
    }
}
