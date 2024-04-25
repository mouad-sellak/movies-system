<?php
class FilmController
{

    public function createFilm()
    {
        $film = array(
            'title' => $_POST['title'],
            'category' => $_POST['category'],
            'director' => $_POST['director'],
            'actors' => $_POST['actors'],
            'price' => $_POST['price'],
            'image' => $_POST['image'],
            'date_sortie' => $_POST['date_sortie']
        );
        $result = Film::create($film);
        if ($result === 'ok') {
            header('location: gestion-films');
        } else {
            echo $result;
        }
    }

    public function readAllFilms()
    {
        $Film = Film::readAll();
        return $Film;
    }



    public function readFilm($id)
    {
        $Film = Film::read($id);
        return $Film;
    }

    public function findFilms(){
        if(isset($_POST['search'])){
            $data=array('search'=>$_POST['search']);
        }
        $films = Film::find($data);
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

    public function getAvis()
    {
        $id = $_POST['movie_id'];
        $avis = Film::getMovieAvis($id);
        return $avis;
    }
}
