<?php

namespace Manager;

abstract class AbstractManager
{
    protected static $pdo = null;

    public function __construct()
    {
        if (null == self::$pdo) {
            // antislashes devant car PDO est à la racine de l'espace de nom (sinon php va cherche un objet Manager\PDO)
            self::$pdo = new \PDO('mysql:host=localhost;dbname=wf3_blog', 'root', '');
            self::$pdo->exec('SET CHARACTER SET utf8');
        }
    }
}
