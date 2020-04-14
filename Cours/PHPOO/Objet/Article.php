<?php
/*
    Une classe est définie par le mot clé "class" puis le nom de celle-ci
    Par convention le nom des classes doit commancer par une lettre majuscule et écrite en CamelCase
    Une classe est définie dans un fichier qui a le même nom class Article => Article.php
*/

/**
 * Gestion des articles.
 */
class Article
{
    // Propriétés (attributs)
    // Le mot clé public indique que ces attributs pourront être lus à l'extérieur
    public $title;
    public $content;
    // Propriété privée donc innaccessible en dehors de la classe
    private $date;

    // Constructeur de l'objet appelé lors de l'instanciation (new)
    // Permet d'initialiser des propriétés, il peut demander des attributs obligatoire pour le bon fonctionnement de l'objet
    public function __construct($title)
    {
        $this->title = trim(strip_tags($title));
        // Définis la date à la date du jour
        $this->date = new DateTime();
    }

    public function formatTitle()
    {
        // Attention, ne pas mettre de $ entre la flèche et le nom de proprieté
        return '<h2>'.$this->title.'</h2>';
    }

    /**
     * Retourne la date formatée.
     */
    public function formatDate()
    {
        return $this->date->format('d/m/Y');
    }
}
