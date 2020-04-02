<?php

$title = 'Gestion des destinations';

$destinations = getAllDestinations();

ob_start();
?>
<h1><?=$title; ?></h1>
<?php require_once 'menu.php'; ?>
<div class="table-responsive">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Photo</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($destinations as $dest): ?>
            <tr>
                <td></td>
                <td><?=$dest['name']; ?></td>
                <td><?=substr($dest['description'], 0, 20); ?></td>
                <td>
                    <a class="btn btn-secondary" href="index.php?p=admin_destinationEdit&id=<?=$dest['id']; ?>">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php

$content = ob_get_clean();

require_once '../template.php';
