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
                            <label class="control-label" for="nom">Nom*</label>
                            <input type="text" class="form-control deblock" name="nom">
                            <span id="controleNom"></span>
                            <strong id="explicationNom"></strong>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="caracteristiques">Caracteristiques*</label>
                            <textarea class="form-control deblock" name="caracteristiques"></textarea>
                            <span id="controleCaracteristiques"></span>
                            <strong id="explicationCaracteristiques"></strong>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="moteur">Moteur*</label>
                            <input type="text" class="form-control deblock" name="moteur">
                            <span id="controleMoteur"></span>
                            <strong id="explicationMoteur"></strong>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="annee">Annee de mise en circulation*</label>
                            <input type="number" class="form-control" name="annee" min="1900" max="2023">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="kilometrage">Kilometrage*</label>
                            <input type="number" class="form-control" name="kilometrage" min="10">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="prix">Prix($)*</label>
                            <input type="number" class="form-control" name="prix" min="0">
                        </div>
                        <label for="images">Images :</label>
                        <input type="file" name="images[]" id="images" required multiple accept="public/images/films/*" ><br>
                        <div class="form-group">
                            <button type="submit" name="submit" disabled class="btn btn-light">Valider</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/movies-system/public/js/film-create-validate.js"></script>