<?php

namespace App\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\Security\Core\Security;

class Builder
{
    /**
     * Objet pour construire un menu.
     */
    private $factory;
    private $security;

    public function __construct(FactoryInterface $factory, Security $security)
    {
        $this->factory = $factory;
        $this->security = $security;
    }

    /*
     * Génére le menu principale
     */
    public function mainMenu(array $options)
    {
        // Créer une racine
        $menu = $this->factory->createItem('root');

        // Ajout d'un item
        $menu->addChild('menu.articles', ['route' => 'app_article_index']);

        // Utilisation du service security pour tester le rôle
        if ($this->security->isGranted('ROLE_ADMIN')) {
            $menu->addChild('menu.admin', ['route' => 'app_app_home']);
        }

        return $menu;
    }
}
