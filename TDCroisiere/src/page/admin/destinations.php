<?php

$title = 'Gestion des destinations';

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

        </tbody>
    </table>
</div>
<?php

$content = ob_get_clean();

require_once '../template.php';
