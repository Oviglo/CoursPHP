<?php 

$title = "WF3 Croisière - Administration";
$cruises = getAllCruises();

ob_start(); ?>
<h1>Gestion des Croisières</h1>
<?php require('menu.php'); ?>
<div class="card">
    <div class="card-header">
        <a href="index.php?p=admin_croisiereEdit" class="btn btn-success">Ajouter une croisière</a>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead class="bg-secondary text-light">
                <tr>
                    <th>Destination</th>
                    <th>Départ</th>
                    <th>Arrivée</th>
                    <th>Navire</th>
                    <th>Réservations</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($cruises as $cruise) { ?>
                <tr>
                    <td><?=$cruise['name']?></td>
                    <td><?=date_format(date_create($cruise["date_departure"]), "d/m/Y") ?></td>
                    <td><?=date_format(date_create($cruise["date_arrival"]), "d/m/Y") ?></td>
                    <td><?=$cruise['boat'] ?></td>
                    <td><?=$cruise['books']?></td>
                    <td>
                        <a href="index.php?p=admin_croisiereEdit&id=<?=$cruise['id']?>" class="btn btn-light"><i class="fas fa-pencil-alt"></i></a>
                        <a href="index.php?p=admin_croisiereDelete&id=<?=$cruise['id']?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php $content = ob_get_clean(); 
 require('../template.php'); ?>