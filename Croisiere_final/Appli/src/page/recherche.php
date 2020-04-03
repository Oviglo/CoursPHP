<?php 

$title = "WF3 Croisière - Rechercher";
$error = null;

// La variable GET existe = on a envoyé le formulaire
if (isset($_GET['destination']) && isset($_GET['date'])) {
    
    $cruises = searchCruise($_GET['date'], $_GET['destination']);
}

ob_start(); ?>
<h1>Rechercher une croisière</h1>
<?php 
if (null != $error) {
    ?>
    <div class="alert alert-danger"><?=$error ?></div>
    <?php
}
?>
<div class="card">
    <table class="table table-striped">
        <thead class="bg-secondary text-light">
            <tr>
                <th>Destination</th>
                <th>Départ</th>
                <th>Arrivé</th>
                <th>Navire</th>
                <th>Reserver</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        
        if (count($cruises) == 0) {
            echo '<div class="center">Aucune croisière trouvée</div>';
        } else {
            foreach ($cruises as $cruise) {
            ?>
            <tr>
                <td>
                    <?php if ($cruise['photo'] != "") { ?><img width="120" src="<?=$cruise['photo']?>" alt="<?=$cruise["name"]?>" /><?php } ?>
                    <a href="index.php?p=afficheCroisiere&id=<?=$cruise['id']?>"><?=$cruise["name"] ?></a>
                </td>
                <td><?=date_format(date_create($cruise["date_departure"]), "d/m/Y") ?></td>
                <td><?=date_format(date_create($cruise["date_arrival"]), "d/m/Y") ?></td>
                <td><?=$cruise["boat"] ?></td>
                <td><?php if (isset($_SESSION['user_id'])) { ?>
                    <a href="?p=reserver&cruise_id=<?=$cruise['id']?>" class="btn btn-primary"><i class="fas fa-check"></i> Réserver</a>
                <?php } ?>
                </td>
            </tr>

            <?php 
            }
        }
        ?>
        </tbody>
    </table>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('../template.php'); ?>