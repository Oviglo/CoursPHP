<?php 
define("PASSWORD_HASH", "WF3 is good");

function isUserExists($username, $email): bool
{
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM user WHERE username = :username OR email = :email");
    $query->bindValue('username', $username);
    $query->bindValue('email', $email);
    $query->execute();

    return is_array($query->fetch());
}
/**
 * Creation d'un utilisateur
 * 
 * @param string $username
 * @param string $password
 * @param string $email
 */
function createNewUser(string $username, string $email, string $password): array
{
    global $pdo;
    if( empty($username) || empty($email) || empty($password) ) {
        return [
            'status' => 'error',
            'message' => 'Merci de remplir tous les champs'
        ];
    }

    // Test si l'utilisateur existe
    $userExists = isUserExists($username, $email);
    if ($userExists) {
        return [
            'status' => 'error',
            'message' => "L'utilisateur existe déjà"
        ];
    }
    // Cryptage du mot de passe
    $password = md5($password . PASSWORD_HASH);
    $username = strip_tags($username); // Supprime les éventuelles balises html -> XSS
    $query = $pdo->prepare("INSERT INTO user (username, password, email) VALUES (:username, :password, :email)");
    $query->bindValue(':username', $username);
    $query->bindValue(':password', $password);
    $query->bindValue(':email', $email);

    if($query->execute()) {
        return [
            'status' => 'success', 
            'message' => "Bienvenue $username"
        ];
    }

    return [
        'status' => 'error', 
        'message' => "Impossible de créer ce compte"
    ];
}

function login(string $username, string $password): array
{
    global $pdo;
    if( empty($username) || empty($password) ) {
        return [
            'status' => 'error',
            'message' => "Vous devez entrer un nom d'utilisateur et un mot de passe."
        ];
    }

    $password = md5($password . PASSWORD_HASH);
    $query = $pdo->prepare("SELECT * FROM user WHERE username = :username AND password = :password");
    $query->execute(array(':username' => $username, ':password' => $password));

    if($user = $query->fetch()) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_username'] = $user['username'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_admin'] = $user['admin'];

        return [
            'status' => 'success', 
            'message' => "Ravi de vous revoir $username !",
        ];
    }
}  

function logout(): array
{
    if(isset($_SESSION['user_id'])) {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_admin']);
    }

    return [
        'status' => 'success', 
        'message' => "Vous êtes maintenant déconnecté",
    ];
}

function getAllUsers()
{
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM user");

    return $query->execute()? $query->fetchAll() : [];
}