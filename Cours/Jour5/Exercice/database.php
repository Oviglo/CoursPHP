<?php

/*
    Ecrire une fonction "getPDO" qui va créer et retourner un objet PDO avec les bons paramètres
    - UTF8
    - setAttribute FETCH_ASSOC
 */

/**
 * Retourne un objet PDO.
 */
function getPDO()
{
    $dsn = 'mysql:host=localhost;dbname=wf3_test';
    $pdo = new PDO($dsn, 'root', '');
    $pdo->exec('SET CHARACTER SET utf8');
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    return $pdo;
}

/*
    Ecrire une fonction avec l'objet PDO en paramètre qui retourne tous les articles
*/

/**
 * Retourne tous les articles.
 *
 * @param $pdo Objet PDO
 *
 * @return array Tableau avec les articles
 */
function getArticles($pdo)
{
    $request = $pdo->query('SELECT * FROM article'); // execute une requête et retourne un PDOStatement

    return $request->fetchAll();

    /*
    $articles = [];
    while($article = $request->fetch()) { // fetch renvoi la ligne courante puis passe à la suivante
        $article[] = $article;
    }

    return $articles;
    */
}

/*
Ecrire une fonction getArticle($pdo, $id) qui retournera un seul article à partir de l'id
- la fonction $request->fetch() va retourner un seul résultat
- utiliser la fonction "prepare" et "bindValue" pour définir l'id que la requête doit rechercher
*/
function getArticle($pdo, $id)
{
    /*
    Méthode non sécurisée
    avec cette méthode, on peut faire une injection SQL dans le pramètre $id
    Ex: $id = "0 OR title='Deuxième article'"
    La requête deviens "SELECT * FROM article WHERE id=0 OR title='Deuxième article'"
    $id = "0; DROP TABLE article" va supprimer la table article
    */
    //$request = $pdo->query("SELECT * FROM article WHERE id=$id");

    //var_dump($request->fetchAll()); // Test avec fetchAll (tout les résultats dans un tableau PHP)
    //var_dump($request->fetch()); // Fetch retourne un seul résultat

    // Méhode sécurisée
    $request = $pdo->prepare('SELECT * FROM article WHERE id = ?');
    $request->bindValue(1, $id, PDO::PARAM_INT); // la fonction va tester si $id est bien un entier
    $request->execute(); // execute la requête préparé

    return $request->fetch(); // Retourne l'article trouvé sous forme de tableau PHP
}
