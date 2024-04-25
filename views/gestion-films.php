<?php
$film = new FilmController();
$films = $film->readAllFilms();
?>
<div class="container">
    <div class="row mt-2">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-body bg-dark">
                    
                        <div class="col-md-8">
                        <a href="http://localhost/movies-system/film-create" title="Ajouter film" class="btn btn-light"><i class="fa fa-plus"></i></a>
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
                            <input type="hidden" name="id" value="<?php echo $film['id']; ?>">
                            <button type="submit" formaction="http://localhost/movies-system/film-delete" class="btn btn-sm btn-danger ml-2" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce film ?');">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        <?php }; ?>
    </div>
</div>