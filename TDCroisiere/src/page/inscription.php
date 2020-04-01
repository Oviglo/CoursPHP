<?php

$title = "S'inscrire";

$errors = []; // Erreurs pour le formulaire

// Test si le formulaire est envoyé
if (!empty($_POST)) {
    $_POST = array_map('trim', $_POST);
    $_POST = array_map('strip_tags', $_POST); // retire les balises html

    if (strlen($_POST['username']) < 4) {
        $errors['username'] = "Le nom d'utilisateur est trop court (min: 4 charactères)";
    }

    if (strlen($_POST['password']) < 8) {
        $errors['password'] = 'Le mot de passe doit contenir au moins 8 caractères';
    }

    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) { // Test si l'adresse email est au bon format
        $errors['email'] = "Votre adresse email n'est pas valide";
    }

    var_dump($errors);
}

ob_start();
?>
<h1>S'inscrire</h1>
<!-- div.card.form-frame>div.card-body>(div.form-group>input:text[name="username"])+(div.form-group>input:email[name="email"])+(div.form-group>input:password[name="password"])+button:submit.btn.btn-primary.btn-block --> 
<div class="card form-frame">
    <div class="card-body">
        <form action="" method="post">
            <div class="form-group">
                <input class="form-control <?=isset($errors['username']) ? 'is-invalid' : ''; ?>" placeholder="Nom d'utilisateur" type="text" name="username" id="">
                <?php if (isset($errors['username'])): ?>
                <div class="invalid-feedback">
                    <?=$errors['username']; ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <input class="form-control" placeholder="Adresse email" type="email" name="email" id="">
            </div>
            <div class="form-group">
                <input class="form-control" placeholder="Mot de passe" type="password" name="password" id="">
            </div>
            <button type="submit" class="btn btn-primary btn-block">S'inscrire</button>
        </form>
    </div>
</div>
<?php
$content = ob_get_clean();

require_once '../template.php';
