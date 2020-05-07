<?php

namespace App\Repository;

use App\Entity\Article;
use App\Entity\ArticleScore;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ArticleScore|null find($id, $lockMode = null, $lockVersion = null)
 * @method ArticleScore|null findOneBy(array $criteria, array $orderBy = null)
 * @method ArticleScore[]    findAll()
 * @method ArticleScore[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleScoreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ArticleScore::class);
    }

    // /**
    //  * @return ArticleScore[] Returns an array of ArticleScore objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /**
     * Retourne la note que l'utilisateur a donné à l'article.
     */
    public function findOneByArticleUser(Article $article, User $user): ?ArticleScore
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.article = :article')
            ->andWhere('s.user = :user')
            ->setParameter('article', $article)
            ->setParameter('user', $user)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
