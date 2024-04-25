<?php
class CardController
{
    public function addToCart()
    {
        $quantity = 1;
        if (isset($_POST['user_id'], $_POST['movie_id'])) {
            $result = Card::addToCart($_POST['user_id'], $_POST['movie_id'], $quantity);
            if ($result === 'ok') {
                return 'ok';
            } else {
                echo 'Erreur lors de l\'ajout au panier.';
            }
        }
    }

    public function deleteItem()
    {
        if (isset($_POST['card_id'])) {
            $result = Card::removeFromCart($_POST['card_id']);
            if ($result === 'ok') {
                header('location: gastion-panier');
            } else {
                echo 'Erreur lors de la suppression du panier.';
            }
        }
    }

    public function updateCart()
    {
        if (isset($_POST['card_id'], $_POST['quantity'])) {
            $result = Card::updateQuantity($_POST['card_id'], $_POST['quantity']);
            if ($result === 'ok') {
                header('location: cart-view');
            } else {
                echo 'Erreur lors de la mise à jour du panier.';
            }
        }
    }

    public function getItems()
    {
            $userId = $_SESSION['user']->id;
            $cartItems = Card::getCartItems($userId);
            return $cartItems;
    }
}
?>
