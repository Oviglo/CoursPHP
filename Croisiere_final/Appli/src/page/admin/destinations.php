<?php 

$title = "WF3 Croisière - Administration";
$destinations = getAllDestinations();

ob_start(); ?>
<h1>Gestion des destinations</h1>
<?php require('menu.php'); ?>
<div class="card">
    <div class="card-header">
        <a href="index.php?p=admin_destinationEdit" class="btn btn-success">Ajouter une destination</a>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead class="bg-secondary text-light">
                <tr>
                    <th>Photo</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($destinations as $dest) { ?>
                <tr>
                <td><?php if ($dest['photo'] != "") { ?><img width="120" src="<?=$dest['photo']?>" alt="<?=$dest["name"]?>" /><?php } ?></td>
                    <td><?=$dest['name'] ?></td>
                    <td><?=substr($dest['description'], 0, 80) ?></td>
                    <td>
                        <a href="index.php?p=admin_destinationEdit&id=<?=$dest['id']?>" class="btn btn-light"><i class="fas fa-pencil-alt"></i></a>
                        <a href="index.php?p=admin_destinationDelete&id=<?=$dest['id']?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php $content = ob_get_clean(); 
 require('../template.php'); ?>