<?php

namespace App\Security\Voter;

use App\Entity\Article;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

class ArticleVoter extends Voter
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    /**
     * Indique à SF si ce voter est concerné par l'action demandées (modifier un article).
     *
     * @param string $attributes: quelle est l'action à tester (view, edit etc..)
     * @param $subject: Sujet à tester (entité Article)
     */
    protected function supports(string $attributes, $subject)
    {
        // retourne true si $subject est un Article ET si $attributes est une action valide
        return $subject instanceof Article && in_array($attributes, ['view', 'edit']);
    }

    /**
     * Test si l'utilisateur peut faire l'action demandée.
     *
     * @param string $attributes: quelle est l'action à tester (view, edit etc..)
     * @param $subject: Sujet à tester (entité Article)
     * @param TokenInterface $token permet de récupérer l'entité User qui est connectée
     */
    protected function voteOnAttribute(string $attribute, $subject, TokenInterface $token)
    {
        // Récupére l'utilisateur connecté (si personne est connecté, retourne une chaine 'Anomymous')
        $user = $token->getUser();

        switch ($attribute) {
            case 'edit':
                return $this->security->isGranted('ROLE_ADMIN');

            case 'view':
                if ($this->security->isGranted('ROLE_ADMIN')) {
                    return true;
                }
                // Visible seulement si l'article est publié
                return $subject->getPublished();
        }

        return false;
    }
}
