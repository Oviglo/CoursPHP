<?php

function getMovieCount()
{
    global $pdo;
    $request = $pdo->query('SELECT COUNT(*) AS nb_movie FROM movie');

    return $request->fetch()['nb_movie']; // Fetch retourne un tableau contenant l'index 'nb_movie';
}

function getMovieOffset($offset)
{
    global $pdo;
    $request = $pdo->prepare('SELECT * FROM movie LIMIT :offset, 10');
    $request->bindValue(':offset', $offset);
    $request->execute();

    return $request->fetchAll();
}

// Le numéro de la page est envoyé par une GET
$page = $_GET['page'] ?? 1; // Par défaut c'est la première page
// Calcul de l'offset
$offset = ($page - 1) * 10; // Page - 1 car on veut l'offset à 0 pour la page 1
$movieCount = getMovieCount();

// Calcul s'il y a une page precédente (donc $page > 1)
$hasPrevPage = ($page > 1);

// Calcul s'il y a une page suivante (donc $page*10 < nombre total de film)
$hasNextPage = ($page * 10 < $movieCount);
?>

<?php if ($hasPrevPage): ?>
    <a href="?page=<?=($page - 1); ?>">Précedent</a>
<?php endif; ?>

<?php if ($hasNextPage): ?>
    <a href="?page=<?=($page + 1); ?>">Suivant</a>
<?php endif; ?>
