<?php 

$title = "WF3 Croisière - Administration";
$users = getAllUsers();

ob_start(); ?>
<h1>Gestion des Utilisateurs</h1>
<?php require('menu.php'); ?>
<div class="card">
    <div class="table-responsive">
        <table class="table">
            <thead class="bg-secondary text-light">
                <tr>
                    <th>Nom d'utilisateur</th>
                    <th>E-mail</th>
                    <th>Admin</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($users as $user) { ?>
                <tr>
                    <td><?=$user['username']?></td>
                    <td><?=$user['email']?></td>
                    <td>
                        <?php if ($user['admin'] == 1) {
                            echo '<span class="badge badge-success">Oui</span>';
                        } else {
                            echo '<span class="badge badge-danger">Non</span>';
                        }  ?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php $content = ob_get_clean(); 
 require('../template.php'); ?>