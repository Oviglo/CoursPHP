<?php 

/*
    Pour la gestion des bases de données en PHP
    On utilise la bibliothèque PDO (PHP Data Object)

    Lors de la création de l'objet PDO, il faut lui envoyer les paramètres suivants

    - Data Source Name (DSN): chaîne de caractère qui "résume" les paramètres de connexion à la base de données

    - Nom d'utilisateur
    - Mot de passe 

    http://php.net/manual/fr/ref.pdo-mysql.connection.php
*/

// Création de la chaîne de connexion DSN
$dsn = 'mysql:host=localhost;dbname=wf3_test';
// Création d'un objet PDO avec le DSN, user, password
$pdo = new PDO($dsn, 'root', ''); // Retourne un objet (groupe de fonctions)
// Dire à PDO d'afficher les erreurs
// $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Création d'une table "article"
$query = '
    CREATE TABLE article (
        id INT(11) NOT NULL AUTO_INCREMENT,
        title VARCHAR(80) NOT NULL,
        date_create DATE NOT NULL,
        content TEXT NOT NULL,
        PRIMARY KEY (id)
    ) ENGINE=InnoDB;
';
// Execution de la requête
// $pdo->exec($query); // '->' veut dire qu'on appelle une fonction de l'objet (groupe) PDO

// var_dump( $pdo->errorInfo() ); // Affiche les erreur retournées par PDO

// Insertion de données
$query = "INSERT INTO article (title, date_create, content) 
VALUES ('Premier article', '2020-03-27', 'Mon super article')";

// $pdo->exec($query); // Execution de la requête INSERT

$title = "Deuxième article";
$date = '2019-12-01';
$content = 'Mon super article';

// Demande à PDO de "préparer" une requête, PDO va retourner un objet PDOStatement
$prep = $pdo->prepare("INSERT INTO article (title, date_create, content)
VALUES (?, ?, ?)");

// Remplace les inconnus (?) par des variables PHP
// Passer par bindValue permet à PDO de contrôler les valeurs (evite les injections SQL)
$prep->bindValue(1, $title);
$prep->bindValue(2, $date);
$prep->bindValue(3, $content);

// Exécuter la requête
$prep->execute();

var_dump( $pdo->errorInfo() );