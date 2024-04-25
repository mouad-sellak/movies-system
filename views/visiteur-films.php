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
                            <div class="col-sm-2">
                                <label for="filterKilometrageMin" class="control-label">Kilometrage min:</label>
                                <input type="number" name="filtreKilometrageMin" id="filtreKilometrageMin" min="10" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">
                                <button type="submit" name="submit" class="btn btn-light">Filtrer</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="row mt-4">
        <?php foreach ($services as $service) { ?>
            <div class="col-md-4 mb-4">
                <div class="card bg-dark">
                    <img src="<?= $service['image']; ?>" class="card-img-top image" alt="<?= $service['nom']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $service['nom']; ?></h5>
                        <p class="card-text">Description: <?= $service['description']; ?></p>
                        <form method="post">
                            <input type="hidden" name="id" value="<?php echo $service['id']; ?>">
                            <button type="submit" formaction="http://localhost/movies-system/add-card" class="btn btn-light">Contacter l'atelier</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php }; ?>
    </div>
</div>
<script src="/movies-system/public/js/validate-filtres.js" defer></script>