<?php
class Film
{
    static public function create($film)
    {
        // Désactiver l'affichage des avertissements
        error_reporting(E_ERROR | E_PARSE);
        $destinationDirectory = '/movies-system/public/images/films/';
        $dossierTempo = $_FILES['image']['tmp_name'];
        $dossierSite = $destinationDirectory . basename($_FILES['image']['name']);
        if (file_exists($dossierTempo)) {
            // Désactiver les avertissements spécifiques pour cette instruction
            @move_uploaded_file($dossierTempo, $dossierSite);
        }
        $sql = 'INSERT INTO movies(title, category, director,actors,price,image, date_sortie) 
                        VALUES (:title, :category, :director,:actors,:price,:image, :date_sortie)';
        $Connexion = Connexion::Connect();
        $pdo = $Connexion->prepare($sql);
        $pdo->bindParam(':title', $film['title'], PDO::PARAM_STR);
        $pdo->bindParam(':category', $film['category'], PDO::PARAM_STR);
        $pdo->bindParam(':director', $film['director'], PDO::PARAM_STR);
        $pdo->bindParam(':actors', $film['actors'], PDO::PARAM_STR);
        $pdo->bindParam(':price', $film['price'], PDO::PARAM_STR);
        $pdo->bindParam(':image', $dossierSite, PDO::PARAM_STR);
        $pdo->bindParam(':date_sortie', $film['date_sortie'], PDO::PARAM_STR);
        if ($pdo->execute()) {
            return 'ok';
        } else {
            return 'error';
        }
    }

    static public function readAll()
    {
        $sql = "SELECT * FROM movies";
        $pdo = Connexion::Connect()->prepare($sql);
        $pdo->execute();
        return $pdo->fetchAll(PDO::FETCH_ASSOC);
    }


    static public function read($id)
    {
        try {
            $sql = "SELECT * FROM movies WHERE id=:id";
            $pdo = Connexion::Connect()->prepare($sql);
            $pdo->execute(array(":id" => $id));
            $film = $pdo->fetch(PDO::FETCH_ASSOC);
            return $film;
        } catch (PDOException $e) {
            echo 'erreur' . $e->getMessage();
        }
    }

    static public function find($data){
        $search = $data['search'];
        try {
            $pdo = Connexion::Connect()->prepare("SELECT * FROM movies where title LIKE ? OR director LIKE ?");
            $pdo->execute(array('%'.$search.'%','%'.$search.'%'));
            $films = $pdo->fetchAll();
            return $films;
        } catch (PDOException $e) {
            echo 'erreur' . $e->getMessage();
        }
    }

    static public function delete($id)
    {

        $pdo1 = Connexion::Connect()->prepare("DELETE FROM movies where id=:id");
        $pdo1->bindParam(':id', $id, PDO::PARAM_INT);
        if ($pdo1->execute()) {
            return 'ok';
        } else {
            return 'error';
        }
    }

    static public function getMovieAvis($id)
    {
        $pdo = Connexion::Connect()->prepare("SELECT * FROM avis WHERE movie_id=:id");
        $pdo->bindParam(':id', $id, PDO::PARAM_INT);
        $pdo->execute();
        return $pdo->fetchAll(PDO::FETCH_ASSOC);
    }
}
