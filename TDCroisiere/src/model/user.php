<?php

/**
 * Retourne si le nom d'utilisateur OU l'adresse email existe.
 */
function isUserExists($username, $email)
{
    // SELECT * FROM user WHERE username = :username OR email = :email
    global $pdo;
    $request = $pdo->prepare('SELECT * FROM user WHERE username = :username OR email = :email');
    $request->bindValue(':username', $username);
    $request->bindValue(':email', $email);

    $request->execute();
    $result = $request->fetch(); // fetch car on a juste besoin d'une ligne
    // fetch retourne false s'il ne trouve pas d'user, et retourne un tableau s'il y en a un

    return is_array($result); // Retourne vrai si $result est un tableau
}

/**
 * Ajoute un utilisateur.
 *
 * @return array Tableau contenant un message et le type de message
 */
function addUser($username, $email, $password)
{
    global $pdo;

    if (isUserExists($username, $email)) { // Si l'utilisateur existe on retourne une erreur
        return ['message' => "L'utilisateur existe déjà", 'type' => 'error'];
    }

    // cripter le mot de passe
    $password = password_hash($password, PASSWORD_DEFAULT);

    $request = $pdo->prepare('INSERT INTO user (username, email, password) VALUES (:username, :email, :password)');

    $request->bindValue(':username', $username);
    $request->bindValue(':email', $email);
    $request->bindValue(':password', $password);

    if (!$request->execute()) { // L'execution de la requête ne s'est pas bien déroulé
        var_dump($request->errorInfo()); // Affiche l'erreur explicite de pdo

        return ['message' => 'Une erreur est survenue', 'type' => 'error'];
    }

    return ['message' => 'Bienvenue', 'type' => 'success'];
}

/**
 * Connexion.
 */
function login($username, $password)
{
    global $pdo;
    // Charge d'abort l'utilisateur par rapport a l'username entré
    $request = $pdo->prepare('SELECT * FROM user WHERE username=:username');
    $request->bindValue(':username', $username);
    $request->execute();

    $user = $request->fetch();

    if (!$user) { // L'utilisateur n'existe pas
        return ['message' => "L'utilisateur n'existe pas", 'type' => 'error'];
    }

    if (!password_verify($password, $user['password'])) { // Le mot de passe n'est pas bon
        return ['message' => 'Mot de passe incorrecte', 'type' => 'error'];
    }

    // Connexion
    // On va se souvenir de l'utilisateur, on enregistre dans des SESSION
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_username'] = $user['username'];
    $_SESSION['user_admin'] = $user['admin'];

    return ['message' => "Ravi de vous revoir $username", 'type' => 'success'];
}

/**
 * Déconnexion.
 */
function logout()
{
    unset($_SESSION['user_id']);
    unset($_SESSION['user_username']);
    unset($_SESSION['user_admin']);
}
