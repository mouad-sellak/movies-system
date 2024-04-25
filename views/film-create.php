<?php
if (isset($_POST['submit'])) {
    $newFilm = new FilmController();
    $newFilm->createFilm();
}
?>
<div class="container">
    <div class="row mb-4 mt-4">
        <div class="col-md-8  mx-auto">
            <div class="card">
                <div class="card card-header bg-dark">
                    <h5><label>Ajouter une film</label></h5>
                </div>
                <div class="card-body bg-dark" id="box">
                    <a href="http://localhost/movies-system/gestion-films" class="btn btn-light mb-2"><i class="fa fa-home"></i></a>
                    <form method="post" onsubmit="return validateForm();" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="control-label" for="nom">Titre*</label>
                            <input type="text" class="form-control deblock" name="title">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="category">Category*</label>
                            <input type="text" class="form-control deblock" name="category">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="director">Realisateur*</label>
                            <input type="text" class="form-control deblock" name="director">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="director">Acteurs*</label>
                            <textarea class="form-control deblock" name="actors"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="director">Date de sortie*</label>
                            <input type="date" class="form-control" name="date_sortie">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="prix">Prix($)*</label>
                            <input type="number" class="form-control" name="price" min="0">
                        </div>
                        <label for="images">Image :</label>
                        <input type="file" name="image" id="image" required  accept="public/images/films/*"><br>
                        <div class="form-group">
                            <button type="submit" name="submit"  class="btn btn-light">Valider</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>