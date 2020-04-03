<?php 

$title = "WF3 Croisière - S'inscrire";

// La variable POST existe = on a envoyé le formulaire de connexion
if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
    
    $result = createNewUser($_POST['username'], $_POST['email'], $_POST['password']);
    addFlashMessage($result['status'], $result['message']);
    if ('success' == $result['status']) {
        $result = login($_POST['username'], $_POST['password']);

        header('Location: index.php');
    }
}

ob_start(); ?>
<h1>Inscription</h1>
<div class="form-frame card">
    <div class="card-body">
        <form action="index.php?p=inscription" method="POST">
            <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="Nom d'utilisateur"/>
            </div>
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Adresse e-mail"/>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Mot de passe"/> 
            </div>
            <button type="submit" class="btn btn-primary btn-block">S'inscrire</button>
        </form> 
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('../template.php'); ?>