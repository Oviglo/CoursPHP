<?php

namespace App\Menu;

use App\Repository\CategoryRepository;
use Knp\Menu\FactoryInterface;
use Symfony\Component\Security\Core\Security;

class Builder
{
    /**
     * Objet pour construire un menu.
     */
    private $factory;
    private $security;
    private $categoryRepository;

    public function __construct(FactoryInterface $factory, Security $security, CategoryRepository $categoryRepository)
    {
        $this->factory = $factory;
        $this->security = $security;
        $this->categoryRepository = $categoryRepository;
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

        // Ajout de menu "Se connecter" ou "Se déconnecter"
        if ($this->security->isGranted('ROLE_USER')) {
            $menu->addChild('menu.logout', ['route' => 'app_logout']);
        } else {
            $menu->addChild('menu.login', ['route' => 'app_login']);
        }

        $categories = $this->categoryRepository->findAll();
        $menuCat = $menu->addChild('categories', ['uri' => '#']);
        foreach ($categories as $category) {
            $menuCat->addChild($category->getName(), ['route' => 'category_show', 'routeParameters' => ['id' => $category->getId()]]);
        }

        return $menu;
    }

    /**
     * Génére le menu admin.
     */
    public function adminMenu(array $options)
    {
        // Créer une racine
        $menu = $this->factory->createItem('root');

        $menu->addChild('menu.articles', ['route' => 'app_article_index']);
        $menu->addChild('menu.categories', ['route' => 'category_index']);
        $menu->addChild('menu.images', ['route' => 'image_index']);
        $menu->addChild('menu.users', ['route' => 'user_index']);

        return $menu;
    }
}
