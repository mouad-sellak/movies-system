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
        $sql = 'INSERT INTO film (nom, description, image) 
                        VALUES (:nom, :description, :image)';
        $Connexion = Connexion::Connect();
        $pdo = $Connexion->prepare($sql);
        $pdo->bindParam(':nom', $film['nom'], PDO::PARAM_STR);
        $pdo->bindParam(':description', $film['description'], PDO::PARAM_STR);
        $pdo->bindParam(':image', $dossierSite, PDO::PARAM_STR);
        if ($pdo->execute()) {
            return 'ok';
        } else {
            return 'error';
        }
    }

    static public function readAll()
    {
        $sql = "SELECT * FROM film";
        $pdo = Connexion::Connect()->prepare($sql);
        $pdo->execute();
        return $pdo->fetchAll(PDO::FETCH_ASSOC);
    }

    static public function readByFilters($filters)
    {
        $conditions = array();
        if (!empty($filters)) {
            // Conditions de filtrage
            $conditions = array(
                !empty($filters['filtreKilometrageMin']) ? "v.kilometrage >= :kilometrage_min" : null,
                !empty($filters['filtreKilometrageMax']) ? "v.kilometrage <= :kilometrage_max" : null,
                !empty($filters['filtreAnneeMin']) ? "v.annee >= :annee_min" : null,
                !empty($filters['filtreAnneeMax']) ? "v.annee <= :annee_max" : null,
                !empty($filters['filtrePrixMin']) ? "v.prix >= :prix_min" : null,
                !empty($filters['filtrePrixMax']) ? "v.prix <= :prix_max" : null
            );
            // Filtres non vides
            $nonEmptyConditions = array_filter($conditions, function ($value) {
                return $value !== null;
            });
        }
        // Construction de la requête SQL de base
        $sql = "SELECT v.id, v.nom, v.annee,v.moteur, v.kilometrage, v.prix, GROUP_CONCAT(voiture_images.lien) AS images_liens
            FROM voiture v
            INNER JOIN voiture_images ON v.id = voiture_images.voiture_id";
        // Ajoutez les conditions à la requête SQL si elles existent
        if (!empty($nonEmptyConditions)) {
            $sql .= " WHERE " . implode(" AND ", $nonEmptyConditions);
        }
        $sql .= " GROUP BY v.id";
        $pdo = Connexion::Connect()->prepare($sql);
        // Bind des valeurs pour les filtres
        if (!empty($filters['filtreKilometrageMin'])) {
            $pdo->bindValue(':kilometrage_min', $filters['filtreKilometrageMin'], PDO::PARAM_INT);
        }
        if (!empty($filters['filtreKilometrageMax'])) {
            $pdo->bindValue(':kilometrage_max', $filters['filtreKilometrageMax'], PDO::PARAM_INT);
        }
        if (!empty($filters['filtreAnneeMin'])) {
            $pdo->bindValue(':annee_min', $filters['filtreAnneeMin'], PDO::PARAM_INT);
        }
        if (!empty($filters['filtreAnneeMax'])) {
            $pdo->bindValue(':annee_max', $filters['filtreAnneeMax'], PDO::PARAM_INT);
        }
        if (!empty($filters['filtrePrixMin'])) {
            $pdo->bindValue(':prix_min', $filters['filtrePrixMin'], PDO::PARAM_INT);
        }
        if (!empty($filters['filtrePrixMax'])) {
            $pdo->bindValue(':prix_max', $filters['filtrePrixMax'], PDO::PARAM_INT);
        }

        $pdo->execute();
        return $pdo->fetchAll(PDO::FETCH_ASSOC);
    }

    static public function read($id)
    {
        try {
            $sql = "SELECT * FROM film WHERE id=:id";
            $pdo = Connexion::Connect()->prepare($sql);
            $pdo->execute(array(":id" => $id));
            $film = $pdo->fetch(PDO::FETCH_ASSOC);
            return $film;
        } catch (PDOException $e) {
            echo 'erreur' . $e->getMessage();
        }
    }

    static public function update($film)
    {
        $sql = "UPDATE film SET nom=:nom, description=:description WHERE id=:id";
        $pdo = Connexion::Connect()->prepare($sql);
        $pdo->bindParam(':id', $film['id'], PDO::PARAM_INT);
        $pdo->bindParam(':nom', $film['nom'], PDO::PARAM_STR);
        $pdo->bindParam(':description', $film['description'], PDO::PARAM_STR);
        if ($pdo->execute()) {
            return 'ok';
        } else {
            return 'error';
        }
    }

    static public function delete($id)
    {

        $pdo1 = Connexion::Connect()->prepare("DELETE FROM film where id=:id");
        $pdo1->bindParam(':id', $id, PDO::PARAM_INT);
        if ($pdo1->execute()) {
            return 'ok';
        } else {
            return 'error';
        }
    }
}
