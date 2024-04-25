<?php
$data = new CardController();
$items = $data->getItems();
?>
<div class="container">
    <div class="row mt-4">
        <div class="col-md-10 text-dark mx-auto">
            <div class="row">
                <?php foreach ($items as $item) { ?>
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <img src="<?php echo $item['image']; ?>" class="card-img-top" alt="Image du film">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $item['title']; ?></h5>
                                <p class="card-text">Quantité: <?php echo $item['quantity']; ?></p>
                                <form method="post" action="card-update" class="mb-2">
                                    <div class="form-group">
                                        <label for="quantity_<?php echo $item['id']; ?>">Modifier la quantité:</label>
                                        <input type="number" class="form-control" id="quantity_<?php echo $item['id']; ?>" name="quantity" value="<?php echo $item['quantity']; ?>">
                                    </div>
                                    <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                                    <button type="submit" class="btn btn-sm btn-success">Mettre à jour</button>
                                </form>
                                <form method="post" action="panier-remove">
                                    <input type="hidden" name="card_id" value="<?php echo $item['id']; ?>">
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article du panier ?');">
                                    <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
