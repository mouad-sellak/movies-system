<?php
if (isset($_POST['id'])) {
    $id= $_POST['id'];
    $existVoiture = new FilmController();
    $existVoiture->deleteFilm($id);
}
 
?>