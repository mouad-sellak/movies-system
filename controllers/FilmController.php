<?php
class FilmController
{

    public function createFilm()
    {
        $film = array(
            'nom' => $_POST['nom'],
            'caracteristiques' => $_POST['caracteristiques'],
            'moteur' => $_POST['moteur'],
            'annee' => $_POST['annee'],
            'kilometrage' => $_POST['kilometrage'],
            'prix' => $_POST['prix']
        );
        $result = Film::create($film);
        if ($result === 'ok') {
            header('location: gestion-films');
        } else {
            echo $result;
        }
    }


    public function updateFilm()
    {
        $film = array(
            'id' => $_POST['id'],
            'nom' => $_POST['nom'],
            'caracteristiques' => $_POST['caracteristiques'],
            'moteur' => $_POST['moteur'],
            'annee' => $_POST['annee'],
            'kilometrage' => $_POST['kilometrage'],
            'prix' => $_POST['prix']
        );
        $result = Film::update($film);
        if ($result == 'ok') {
            header('location: gestion-films');
        }
    }


    public function readFilm($id)
    {
        $Film = Film::read($id);
        return $Film;
    }


    public function readFilmsByFilters()
    {
        $filters = array();
        if (isset($_POST['submit'])) {
            $filters = array(
                'filtreKilometrageMin' => $_POST['filtreKilometrageMin'],
                'filtreKilometrageMax' => $_POST['filtreKilometrageMax'],
                'filtreAnneeMin' => $_POST['filtreAnneeMin'],
                'filtreAnneeMax' => $_POST['filtreAnneeMax'],
                'filtrePrixMin' => $_POST['filtrePrixMin'],
                'filtrePrixMax' => $_POST['filtrePrixMax']
            );
        }
        $films = Film::readByFilters($filters);
        return $films;
    }


    public function deleteFilm($id)
    {
        if (isset($id)) {
            $result = Film::delete($id);
            if ($result === 'ok') {
                header('location: gestion-films');
            }
        }
    }
}
