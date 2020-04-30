<?php

namespace App\Menu;

use Knp\Menu\FactoryInterface;

class Builder
{
    /**
     * Objet pour construire un menu.
     */
    private $factory;

    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    /*
     * Génére le menu principale
     */
    public function mainMenu(array $options)
    {
        // Créer une racine
        $menu = $this->factory->createItem('root');

        // Ajout d'un item
        $menu->addChild('Articles', ['route' => 'app_article_index']);

        return $menu;
    }
}
