<?php

namespace Manager;

use Entity\Category;

class CategoryManager extends AbstractManager
{
    public function save(Category $entity)
    {
        // test s'il faut modifier ou ajouter
        if ($entity->getId() > 0) {
            $request = self::$pdo->prepare('UPDATE category SET name=:name WHERE id = :id');
            $request->bindValue(':id', $entity->getId());
        } else {
            $request = self::$pdo->prepare('INSERT INTO category (name) VALUES (:name)');
        }

        $request->bindValue(':name', $entity->getName());

        if (!$request->execute()) {
            $error = $request->errorInfo();
            trigger_error($error[2], E_USER_WARNING);
        }
    }

    public function findAll()
    {
        $request = self::$pdo->query('SELECT * FROM category ORDER BY id DESC');

        return $request->fetchAll(\PDO::FETCH_CLASS, Category::class);
    }
}
