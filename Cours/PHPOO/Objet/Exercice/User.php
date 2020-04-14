<?php

class User
{
    private $username;
    private $email;
    private $password;

    public function __construct($username, $email, $password)
    {
        $this->username = trim(strip_tags($username));
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        $this->email = filter_var($email, FILTER_SANITIZE_EMAIL);

        // Génére une erreur si le mail n'est pas valide
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            trigger_error('Email invalide', E_USER_ERROR);
        }
    }

    /**
     * Test si le mot de passe est OK.
     */
    public function testPassword($password)
    {
        return password_verify($password, $this->password);
    }
}
