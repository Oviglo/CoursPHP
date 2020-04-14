<?php
/*
    Une classe est définie par le mot clé "class" puis le nom de celle-ci
    Par convention le nom des classes doit commancer par une lettre majuscule et écrite en CamelCase
    Une classe est définie dans un fichier qui a le même nom class Article => Article.php
*/
require_once 'Category.php';

/**
 * Gestion des articles.
 */
class Article
{
    // Propriétés (attributs)
    // Le mot clé public indique que ces attributs pourront être lus à l'extérieur
    private $title;
    public $content;
    // Propriété privée donc innaccessible en dehors de la classe
    private $date;
    // Constante, ne peut être modifiée
    const STATUS_PUBLIE = 1;
    const STATUS_NON_PUBLIE = 0;

    public $status;

    // Propriété statique
    // Sa valeur sera partagée entre tous les objets
    public static $count = 0;

    /**
     * @var Category
     */
    private $category;

    // Constructeur de l'objet appelé lors de l'instanciation (new)
    // Permet d'initialiser des propriétés, il peut demander des attributs obligatoire pour le bon fonctionnement de l'objet
    public function __construct($title)
    {
        $this->title = trim(strip_tags($title));
        // Définis la date à la date du jour
        $this->date = new DateTime();
        // Augmente le compteur
        // self::$count++;
        ++Article::$count;
    }

    // Setter de title
    public function setTitle($title)
    {
        $this->title = trim(strip_tags($title));
    }

    // getter de title
    public function getTitle()
    {
        return $this->title;
    }

    public function formatTitle()
    {
        // Attention, ne pas mettre de $ entre la flèche et le nom de proprieté
        // $this->category->getName() appel la fonction getName de l'objet category
        // $this->category doit obligatoirement retourner un objet Category
        return '<h2>'.$this->title.'('.$this->category->getName().')</h2>';
    }

    /**
     * Retourne la date formatée.
     */
    public function formatDate()
    {
        return $this->date->format('d/m/Y');
    }

    public function estPublie()
    {
        // On peut utiliser le mot clé self quand on est dans la classe
        // return $this->status == self::STATUS_PUBLIE;
        return Article::STATUS_PUBLIE == $this->status;
    }

    // Methode statique
    // Impossible d'utiliser $this
    public static function getCount()
    {
        return self::$count;
    }

    /**
     * Get the value of category.
     *
     * @return Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set the value of category.
     *
     * @param Category $category
     *
     * @return self
     */
    public function setCategory(Category $category)
    {
        $this->category = $category;

        return $this;
    }
}
