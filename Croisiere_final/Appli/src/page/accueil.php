<?php 
$title = 'WF3 Croisière';

$destinations = getAllDestinations($pdo);

$cruises = [];
if (isset($_SESSION['user_id'])) {
    $cruises = getCruiseByUser($_SESSION['user_id']);
}

$slides = getDestinationWithPhoto();
ob_start(); ?>
<h1>WF3 Croisière</h1>

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">Trouvez votre croisière</div>
            <div class="card-body">
                <form action="index.php" method="GET">
                    <div class="form-group">
                        <label class="form-label">Destination</label>
                        <select name="destination" class="form-control">
                            <option value="">Toutes</option>
                            <?php foreach ($destinations as $dest) {
                                ?>
                                <option value="<?=$dest["id"]?>"><?= $dest["name"] ?></option>
                                <?php
                            } 
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Date de départ après</label>
                        <input type="date" class="form-control" name="date" value="<?=date('Y-m-d')?>"/>
                    </div>
                    <input type="hidden" name="p" value="recherche"/>
                    <button type="submit" class="btn btn-primary btn-block">Rechercher</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <?php if (count($slides) > 0) { ?>
        <div id="carouselIndex" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
            <?php foreach ($slides as $key => $slide) { ?>
                <div class="carousel-item <?php if ($key == 0) { echo "active"; }?>">
                    <img src="<?=$slide['photo']?>" class="d-block w-100" alt="<?=$slide['name']?>">
                    <div class="carousel-caption d-none d-md-block">
                        <h5><?=$slide['name']?></h5>
                    </div>
                </div>
            <?php } ?>
            </div>
            <a class="carousel-control-prev" href="#carouselIndex" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselIndex" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <hr/>
        <?php } ?>
        <?php if (isset($_SESSION['user_id'])) { // User connecté ?>
        <h2>Mes croisières</h2>
        <table class="table table-striped">
            <thead class="bg-secondary text-light">
                <tr>
                    <th>Destination</th>
                    <th>Départ</th>
                    <th>Arrivé</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($cruises as $cruise) { ?>
                <tr>
                    <td><?= $cruise["name"] ?></td>
                    <td><?=date_format(date_create($cruise["date_departure"]), "d/m/Y") ?></td>
                    <td><?=date_format(date_create($cruise["date_arrival"]), "d/m/Y") ?></td>
                    <td><a href="?p=annulerCroisiere&cruise_id=<?=$cruise['id']?>" class="btn btn-danger">Annuler</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php } else { // User non connecté ?>
        <?php } ?>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('../template.php'); ?>