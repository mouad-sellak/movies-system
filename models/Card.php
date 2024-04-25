<?php
class Card
{
    static public function addToCart($userId, $movieId, $quantity)
    {
        try {
            $pdo = Connexion::Connect()->prepare("INSERT INTO cards (user_id, movie_id, quantity) VALUES (:user_id, :movie_id, :quantity)");
            $pdo->bindParam(':user_id', $userId, PDO::PARAM_INT);
            $pdo->bindParam(':movie_id', $movieId, PDO::PARAM_INT);
            $pdo->bindParam(':quantity', $quantity, PDO::PARAM_INT);
            if ($pdo->execute()) {
                return 'ok';
            } else {
                return 'error';
            }
        } catch (PDOException $e) {
            echo 'erreur' . $e->getMessage();
        }
    }

    static public function getCartItems($userId)
    {
        try {
            $pdo = Connexion::Connect()->prepare("SELECT c.*, m.title, m.image FROM cards c INNER JOIN movies m ON c.movie_id = m.id WHERE c.user_id = :user_id");
            $pdo->bindParam(':user_id', $userId, PDO::PARAM_INT);
            $pdo->execute();
            return $pdo->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'erreur' . $e->getMessage();
        }
    }

    static public function removeFromCart($cardId)
    {
        try {
            $pdo = Connexion::Connect()->prepare("DELETE FROM cards WHERE id = :card_id");
            $pdo->bindParam(':card_id', $cardId, PDO::PARAM_INT);
            if ($pdo->execute()) {
                return 'ok';
            } else {
                return 'error';
            }
        } catch (PDOException $e) {
            echo 'erreur' . $e->getMessage();
        }
    }

    static public function updateQuantity($cardId, $quantity)
    {
        try {
            $pdo = Connexion::Connect()->prepare("UPDATE cards SET quantity = :quantity WHERE id = :card_id");
            $pdo->bindParam(':card_id', $cardId, PDO::PARAM_INT);
            $pdo->bindParam(':quantity', $quantity, PDO::PARAM_INT);
            if ($pdo->execute()) {
                return 'ok';
            } else {
                return 'error';
            }
        } catch (PDOException $e) {
            echo 'erreur' . $e->getMessage();
        }
    }
}
?>
