<?php

include('Config/db.php');

$allgames = $db->query('SELECT * FROM games ORDER BY id ASC');
if (isset($_GET['search']) and !empty($_GET['search'])) {
    $recherche = htmlspecialchars($_GET['search']);
    $allgames = $db->query('SELECT * FROM games WHERE name_game LIKE "%' . $recherche . '%" ORDER BY id ASC');
}
if (isset($_GET['search_editor']) and !empty($_GET['search_editor'])) {
    $recherche = htmlspecialchars($_GET['search_editor']);
    $allgames = $db->query('SELECT * FROM games WHERE editor LIKE "%' . $recherche . '%" ORDER BY id ASC');
}
if (isset($_GET['search_genre']) and !empty($_GET['search_genre'])) {
    $recherche = htmlspecialchars($_GET['search_genre']);
    $allgames = $db->query('SELECT * FROM games WHERE genre LIKE "%' . $recherche . '%" ORDER BY id ASC');
}
if (isset($_GET['search_device']) and !empty($_GET['search_device'])) {
    $recherche = htmlspecialchars($_GET['search_device']);
    $allgames = $db->query('SELECT * FROM games WHERE device LIKE "%' . $recherche . '%" ORDER BY id ASC');
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Games</title>
</head>

<body>
    <?php include('Components/Header.php'); ?>

    <div class="container">
        <h1 class="">Liste des jeux</h1>
        <div class="d-flex">
            <form method="GET" class="mb-5 mx-2">
                <h6 class="mt-5">Rechercher le nom du jeux</h6>
                <input type="search" name="search" placeholder="rechercher">
                <input type="submit" name="chercher" value="Chercher">
            </form>
            <form method="GET" class="mb-5 mx-2">
                <h6 class="mt-5">Rechercher le nom de l'??diteur</h6>
                <input type="search" name="search_editor" placeholder="rechercher">
                <input type="submit" name="chercher" value="Chercher">
            </form>
            <form method="GET" class="mb-5 mx-2">
                <h6 class="mt-5">Rechercher le genre</h6>
                <input type="search" name="search_genre" placeholder="rechercher">
                <input type="submit" name="chercher" value="Chercher">
            </form>
            <form method="GET" class="mb-5 mx-2">
                <h6 class="mt-5">Rechercher le device</h6>
                <input type="search" name="search_device" placeholder="rechercher">
                <input type="submit" name="chercher" value="Chercher">
            </form>
        </div>
        <form>
            <input type="submit" value="Annuler">
        </form>
        <div class="d-flex flex-wrap">
            <?php if ($allgames->rowCount() > 0) {
                foreach ($allgames as $c) : ?>
                    <div class="card mx-2 mb-2" style="width: 18rem;">
                        <div class="card-body ">
                            <h3 class="card-title"><?= $c['name_game']; ?></h3>
                            <h4 class="card-text"><?= $c['price']; ?>???</h4>
                            <p class="card-text"><?= $c['genre']; ?></p>
                            <p class="card-text"><?= $c['editor']; ?></p>
                            <p class="card-text"><?= $c['device']; ?></p>
                            <a href="show.php?id=<?= $c['id']; ?>" class="btn-light">Voir</a>
                            <a href="update.php?id=<?= $c['id']; ?>" class="btn-light">Modifier</a>
                        </div>
                    </div>
                <?php endforeach;
            } else {
                ?>
                <p>Aucun jeux trouv??</p>
            <?php
            }
            ?>
        </div>
    </div>


    <?php include('Components/Footer.php'); ?>

</body>

</html>