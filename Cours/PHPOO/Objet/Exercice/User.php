<?php

class User
{
    private $username;
    private $email;
    private $password;

    public function __construct($username, $email, $password)
    {
        $this->username = $this->setUsername($username);
        $this->password = $this->setPassword($password);
        $this->email = $this->setEmail($email);
    }

    /**
     * Test si le mot de passe est OK.
     */
    public function testPassword($password)
    {
        return password_verify($password, $this->password);
    }

    /**
     * Get the value of username.
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username.
     *
     * @return self
     */
    public function setUsername($username)
    {
        $this->username = trim(strip_tags($username));

        return $this;
    }

    /**
     * Get the value of email.
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email.
     *
     * @return self
     */
    public function setEmail($email)
    {
        // Génére une erreur si le mail n'est pas valide
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            trigger_error('Email invalide', E_USER_ERROR);
        }
        $this->email = filter_var($email, FILTER_SANITIZE_EMAIL);

        return $this;
    }

    /**
     * Get the value of password.
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password.
     *
     * @return self
     */
    public function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);

        return $this;
    }
}
