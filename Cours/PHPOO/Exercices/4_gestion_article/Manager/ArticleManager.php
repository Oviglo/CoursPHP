<?php

namespace Manager;

use Entity\Article;

class ArticleManager extends AbstractManager
{
    public function save(Article $entity)
    {
        // test s'il faut modifier ou ajouter
        if ($entity->getId() > 0) {
            $request = self::$pdo->prepare('UPDATE article SET title=:title, content=:content, category=:category WHERE id = :id');
            $request->bindValue(':id', $entity->getId());
        } else {
            $request = self::$pdo->prepare('INSERT INTO article (title, content, category) VALUES (:title, :content, :category)');
        }

        $request->bindValue(':title', $entity->getTitle());
        $request->bindValue(':content', $entity->getContent());
        $request->bindValue(':category', $entity->getCategory());

        if (!$request->execute()) {
            // Affiche l'erreur PDO sous forme de warning PHP
            $error = $request->errorInfo();
            trigger_error($error[2], E_USER_WARNING);
        }
    }
}
