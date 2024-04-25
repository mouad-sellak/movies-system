<?php
if (isset($_SESSION['user'])) {
    if (isset($_POST['card-add'])) {
        $card = new CardController();
        if ($card->addToCart() == 'ok') {
            header('location: panier-gestion');
        } else {
            header('location: visiteur-films');
        }
    }
}
if (isset($_POST['find'])) {
    $film = new FilmController();
    $films = $film->findFilms();
} else {
    $film = new FilmController();
    $films = $film->readAllFilms();
}

?>
<div class="container">
    <div class="row mt-2">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-body bg-dark">
                    <div class="col-md-8">
                        <form method="POST" class="float-right d-flex flex-row">
                            <input type="text ml-2" class="form-control" name="search" value="<?php echo isset($_POST['search']) ? $_POST['search'] : "" ?>" placeholder="Titre/Realisateur">
                            <button class="btn btn-primary ml-2 " type="submit" name="find"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <?php foreach ($films as $film) { ?>
            <div class="col-md-4 mb-4">
                <div class="card bg-dark card-hover">
                    <img src="<?= $film['image']; ?>" class="card-img-top image" alt="<?= $film['title']; ?>">
                    <div class="card-body">
                        <h4 class="card-title"><?= $film['title']; ?></h4>
                        <p class="card-text">Prix: <?= $film['price']; ?></p>
                        <form method="post">
                            <input type="hidden" name="movie_id" value="<?php echo $film['id']; ?>">
                            <button type="submit" formaction="http://localhost/movies-system/film-details" class="btn btn-light">Détail</button>
                            <?php if (!isset($_SESSION['user'])) { ?>
                                <button type="submit" formaction="http://localhost/movies-system/utilisateur-login" class="btn btn-primary">Ajouter au panier</button>
                        </form>
                    <?php } else { ?>
                        <form method="post">
                            <input type="hidden" name="movie_id" value="<?php echo $film['id']; ?>">
                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user']->id; ?>">
                            <button type="submit" name="card-add" class="btn btn-primary">Ajouter au panier</button>
                        </form>
                    <?php } ?>
                    </div>
                </div>
            </div>
        <?php }; ?>
    </div>
</div>