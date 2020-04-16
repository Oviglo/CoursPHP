<?php

class Article
{
    private $title;
    private $content;

    // Lors d'un new
    public function __construct()
    {
        echo "Instanciation de l'objet<br/>";
    }

    // Objet détruit à la fin du script
    public function __destruct()
    {
        echo 'Objet détruit<br/>';
    }

    // Lors de l'appel d'une méthode inaccessible
    public function __call($name, $attr)
    {
        echo "Appel de la méthode $name inaccessible<br/>";

        if ('getTitle' == $name) {
            return $this->title;
        }
    }

    // Lors de l'appel d'une méthode statique inaccessible
    public static function __callStatic($name, $attr)
    {
        echo "Appel de la méthode statique $name inaccessible<br/>";
    }

    // Lors de la lecture d'un attribut inaccessible
    public function __get($name)
    {
        echo "Lecture de l'attribut $name inaccessible<br/>";
    }

    // Lors de l'écriture d'un attribut inaccessible
    public function __set($name, $attr)
    {
        echo "Ecriture de l'attribut $name inaccessible<br/>";
        // Exemple d'utilisation
        if ('title' == $name) {
            $this->title = trim(strip_tags($attr));
        }
    }

    // Lors d'une serialization de l'objet
    public function __sleep()
    {
        echo "Serialization de l'objet<br/>";

        // Exemple: si on ne veut pas garder le password d'un objet User
        return ['title', 'content'];
    }

    // Lors d'une déserialization de l'objet
    public function __wakeup()
    {
        echo "Déserialization de l'objet<br/>";
    }

    // Convertir un objet en string
    public function __toString()
    {
        return $this->title;
    }

    // Lors du clonage de l'objet
    public function __clone()
    {
        echo 'Objet cloné<br/>';
    }
}
