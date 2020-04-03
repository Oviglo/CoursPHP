<?php 

$title = "WF3 Croisière - Administration";
$cruises = getNextCruises();

ob_start(); ?>
<h1>Administration</h1>
<?php require('menu.php'); ?>
<div class="card">
    <div class="card-header">
        Prochaines croisières
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead class="bg-secondary text-light">
                <tr>
                    <th>Destination</th>
                    <th>Date départ</th>
                    <th>Date arrivé</th>
                    <th>Navire</th>
                    <th>Réservations</th>
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
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php $content = ob_get_clean(); 
 require('../template.php'); ?>