<?php

$title = "S'inscrire";

$errors = []; // Erreurs pour le formulaire
$username = '';
$email = '';
$password = '';

// Test si le formulaire est envoyé
if (!empty($_POST)) {
    $_POST = array_map('trim', $_POST);
    $_POST = array_map('strip_tags', $_POST); // retire les balises html

    // Stock les valeurs POST pour les afficher dans les "value" des champs
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (strlen($_POST['username']) < 4) {
        $errors['username'] = "Le nom d'utilisateur est trop court (min: 4 charactères)";
    }

    if (strlen($_POST['password']) < 8) {
        $errors['password'] = 'Le mot de passe doit contenir au moins 8 caractères';
    }

    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) { // Test si l'adresse email est au bon format
        $errors['email'] = "Votre adresse email n'est pas valide";
    }

    if (empty($errors)) { // S'il n'y a pas d'erreur
        $result = addUser($username, $email, $password); // Ajoute l'utilisateur

        if ('success' == $result['type']) { // L'utilisateur a bien été ajouté
            addFlashMessage('success', $result['message']);
            header('Location: index.php');
            exit();
        }

        $errors['global'] = $result['message'];
    }
}

ob_start();
?>
<h1>S'inscrire</h1>
<!-- div.card.form-frame>div.card-body>(div.form-group>input:text[name="username"])+(div.form-group>input:email[name="email"])+(div.form-group>input:password[name="password"])+button:submit.btn.btn-primary.btn-block --> 
<div class="card form-frame">
    <div class="card-body">
        
        <?php if (isset($errors['global'])): ?>
        <div class="alert alert-danger"><?=$errors['global']; ?></div>
        <?php endif; ?>

        <!-- Erreur Ajax --> 
        <div class="alert alert-danger" style="display:none;" id="ajax-error"></div>

        <form action="" method="post" id="registration-form" novalidate>
            <div class="form-group">
                <input class="form-control <?=isset($errors['username']) ? 'is-invalid' : ''; ?>" placeholder="Nom d'utilisateur" type="text" name="username" value="<?=$username; ?>">
                <?php if (isset($errors['username'])): ?>
                <div class="invalid-feedback">
                    <?=$errors['username']; ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <input class="form-control <?=isset($errors['email']) ? 'is-invalid' : ''; ?>" placeholder="Adresse email" type="email" name="email" value="<?=$email; ?>">
                <?php if (isset($errors['email'])): ?>
                <div class="invalid-feedback">
                    <?=$errors['email']; ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <input class="form-control <?=isset($errors['password']) ? 'is-invalid' : ''; ?>" placeholder="Mot de passe" type="password" name="password" value="<?=$password; ?>">
                <?php if (isset($errors['password'])): ?>
                <div class="invalid-feedback">
                    <?=$errors['password']; ?>
                </div>
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-primary btn-block">S'inscrire</button>
        </form>
    </div>
</div>
<?php
$content = ob_get_clean();

require_once '../template.php';
