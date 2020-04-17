<?php

class Config
{
    private $dbConfig = [];

    // Propriété private statique qui contien l'instance unique de l'objet Config
    private static $instance;

    // constructeur en private pour empêcher les utilisateurs de créer une instance
    private function __construct()
    {
        // Requête mysql pour charger les configurations du site
    }

    // Méthode statique pour récupérer la seule instance de l'objet
    public static function getInstance()
    {
        // Test si l'instance est créée
        if (null == self::$instance) {
            self::$instance = new Config();
        }

        return self::$instance;
    }

    /**
     * Get the value of dbConfig.
     */
    public function getDbConfig()
    {
        return $this->dbConfig;
    }

    /**
     * Set the value of dbConfig.
     *
     * @return self
     */
    public function setDbConfig($dbConfig)
    {
        $this->dbConfig = $dbConfig;

        return $this;
    }
}
