<?php

spl_autoload_register();

//$config = new Config();
// Lecture d'une configuration

// Dans un autre fichier...
//$config = new Config();

// Récupération de l'instance de config
$config = Config::getInstance();

var_dump($config->getDbConfig());
