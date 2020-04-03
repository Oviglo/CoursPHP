<?php 

$title = "WF3 Croisière - Administration";
$bookings = getAllBookings();

ob_start(); ?>
<h1>Gestion des Utilisateurs</h1>
<?php require('menu.php'); ?>
<div class="card">
    <div class="table-responsive">
        <table class="table">
            <thead class="bg-secondary text-light">
                <tr>
                    <th>Utilisateur</th>
                    <th>Destination</th>
                    <th>Départ</th>
                    <th>Arrivée</th>
                    <th>Navire</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($bookings as $booking) { ?>
                <tr>
                    <td><?=$booking['username']?></td>
                    <td><?=$booking['name']?></td>
                    <td><?=date_format(date_create($booking["date_departure"]), "d/m/Y") ?></td>
                    <td><?=date_format(date_create($booking["date_arrival"]), "d/m/Y") ?></td>
                    <td><?=$booking['boat']?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php $content = ob_get_clean(); 
 require('../template.php'); ?>