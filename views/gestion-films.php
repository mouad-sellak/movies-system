<?php
$film = new FilmController();
$films = $film->readFilmsByFilters();
?>
<div class="container">
    <form method="POST" class="form-horizontal">
        <div class="row mt-2">
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="card-body bg-dark">
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <a href="http://localhost/movies-system/film-create" title="Ajouter film" class="btn btn-light"><i class="fa fa-plus"></i></a>
                                <span class="mb-2"><strong>Ajouter une film</strong></span>
                            </div>
                            <div class="col-sm-2 ml-auto">
                                <button type="submit" name="submit" class="btn btn-light">Filtrer</button>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2">
                                <label for="filterKilometrageMin" class="control-label">Kilometrage min:</label>
                                <input type="number" name="filtreKilometrageMin" id="filtreKilometrageMin" min="10" class="form-control">
                            </div>

                            <div class="col-sm-2">
                                <label for="filtreKilometrageMax" class="control-label">Kilometrage max:</label>
                                <input type="number" name="filtreKilometrageMax" id="filtreKilometrageMax" min="10" class="form-control">
                            </div>

                            <div class="col-sm-2">
                                <label for="filtreAnneeMin" class="control-label">Annee min:</label>
                                <input type="number" name="filtreAnneeMin" id="filtreAnneeMin" min="1900" max="2023" class="form-control">
                            </div>
                            <div class="col-sm-2">
                                <label for="filtreAnneeMax" class="control-label">Annee max:</label>
                                <input type="number" name="filtreAnneeMax" id="filtreAnneeMax" min="1900" max="2023" class="form-control">
                            </div>

                            <div class="col-sm-2">
                                <label for="filtrePrixMin" class="control-label">Prix min:</label>
                                <input type="number" name="filtrePrixMin" id="filtrePrixMin" min="0" class="form-control">
                            </div>

                            <div class="col-sm-2">
                                <label for="filtrePrixMax" class="control-label">Prix max:</label>
                                <input type="number" name="filtrePrixMax" id="filtrePrixMax" min="0" class="form-control">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="row mt-4">
        <?php foreach ($films as $film) {
            $liens = explode(",", $film['images_liens']);
        ?>
            <div class="col-md-4 mb-4">
                <div class="card bg-dark">
                    <img src="<?= $liens[0]; ?>" class="card-img-top image" alt="<?= $film['nom']; ?>">
                    <div class="card-body">
                        <h4 class="card-title"><?= $film['nom']; ?></h4>
                        <p class="card-text">Année: <?= $film['annee']; ?></p>
                        <p class="card-text">Moteur: <?= $film['moteur']; ?></p>
                        <p class="card-text">Kilométrage: <?= $film['kilometrage']; ?></p>
                        <p class="card-text">Prix: $<?= $film['prix']; ?></p>
                        <form method="post">
                            <input type="hidden" name="id" value="<?php echo $film['id']; ?>">
                            <button type="submit" formaction="http://localhost/movies-system/film-details" class="btn btn-outline-light">Détails</button>
                            <button type="submit" formaction="http://localhost/movies-system/film-update" class="btn btn-sm btn-light  ml-2"><i class="fa fa-edit"></i></button>
                            <button type="submit" formaction="http://localhost/movies-system/film-delete" class="btn btn-sm btn-danger ml-2" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette film ?');">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        <?php }; ?>
    </div>
</div>