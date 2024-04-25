<?php
$filmController = new FilmController();

if (isset($_POST['movie_id'])) {
    $filmId = $_POST['movie_id'];
    $film = $filmController->readFilm($filmId);
    $avis = $filmController->getAvis();
}
?>
<div class="container">
    <div class="row m-4">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card card-header bg-dark">
                    <h5><label>Détails du film</label></h5>
                </div>
                <div class="col-md-6">
                    <img src="<?= $film['image'] ?>" class="card-img-top mb-3 img-detail" alt="<?= $film['title']; ?>">
                </div>
                <div class="card-body bg-dark">
                    <h5 class="card-title"><?= $film['title']; ?></h5>
                    <p class="card-text">Category : <?= $film['category']; ?></p>
                    <p class="card-text">Realisateur: <?= $film['director']; ?></p>
                    <p class="card-text">Acteurs: <?= $film['actors']; ?></p>
                    <p class="card-text">Date de sortie: <?= $film['date_sortie']; ?></p>
                    <p class="card-text">Prix: $<?= $film['price']; ?></p>
                    <?php foreach ($avis as $avi) { ?>
                        <p class="card-text">Avis: <?= $avi['commentaire']; ?></p>
                        <p class="card-text">Note: <?= $avi['note'].'/10'; ?></p>
                    <?php } ?>
                    <?php if (isset($_SESSION['user']) && $_SESSION['user']=="Administrateur") {  ?>
                        <a href="http://localhost/movies-system/gestion-films" class="btn btn-outline-light mb-2"><i class="fa fa-arrow-left"></i> Retour</a>
                    <?php } ?>
                    <?php if (!isset($_SESSION['user'])) { ?>
                        <a href="http://localhost/movies-system/visiteur-films" class="btn btn-outline-light mb-2"><i class="fa fa-arrow-left"></i> Retour</a>
                        <button type="submit" formaction="http://localhost/movies-system/add-card" class="btn btn-primary">Ajouter au panier</button>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>