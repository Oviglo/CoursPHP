<?php

namespace App\Repository;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Persistence\ManagerRegistry;

class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        // On indique que ce repository va gérer l'entité Article
        parent::__construct($registry, Article::class);
    }

    /**
     * Recherche des article.
     */
    public function findBySearch(string $search, int $page = 1, int $countPerPage = 30): Paginator
    {
        $firstResult = ($page - 1) * $countPerPage;
        // demande l'alias de la table (FROM article AS a)
        $query = $this->createQueryBuilder('a')
            ->addSelect('i, c, u') // Ajoute des select pour optimisé la requête
            ->leftJoin('a.image', 'i')
            ->leftJoin('a.categories', 'c')
            ->leftJoin('a.user', 'u')
            ->where('a.content LIKE :search')
            ->setParameter(':search', '%'.trim($search).'%') // Définis le paramètre :search (bindValue)
            ->orderBy('a.dateCreate', 'desc')
            ->setFirstResult($firstResult)
            ->setMaxResults($countPerPage)
            ->getQuery()
        ;

        // return $query->getResult();
        return new Paginator($query);
    }

    public function findAll(int $page = 1, int $countPerPage = 30): Paginator
    {
        // Calcul du premier élémemt à afficher
        $firstResult = ($page - 1) * $countPerPage;

        $query = $this->createQueryBuilder('a')
            ->addSelect('i, c, u') // Ajoute des select pour optimisé la requête
            ->leftJoin('a.image', 'i')
            ->leftJoin('a.categories', 'c')
            ->leftJoin('a.user', 'u')
            ->orderBy('a.dateCreate', 'desc')
            ->setFirstResult($firstResult) // OFFSET
            ->setMaxResults($countPerPage) // LIMIT
            ->getQuery()
        ;

        // Paginator va générer une requête pour obtenir le nombre total d'éléments
        return new Paginator($query);
    }
}
