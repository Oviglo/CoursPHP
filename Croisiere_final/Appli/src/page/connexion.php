<?php 

$title = "WF3 Croisière - Se connecter";

// La variable POST existe = on a envoyé le formulaire de connexion
if (isset($_POST['username']) && isset($_POST['password'])) {
    
    $result = login($_POST['username'], $_POST['password']);
    addFlashMessage($result['status'], $result['message']);
    if ('success' == $result['status']) {
        header('Location: index.php');
        exit;
    }
}

ob_start(); ?>
<h1>Se connecter</h1>
<div class="form-frame card">
    <div class="card-body">
        <form action="index.php?p=connexion" method="POST">
            <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="Nom d'utilisateur"/>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Mot de passe"/> 
            </div>
            <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
        </form> 
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('../template.php'); ?>