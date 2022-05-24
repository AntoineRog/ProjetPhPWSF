<?php

include('Config/db.php');

$response = "SELECT * FROM games";
$stmt = $db->prepare($response);
$stmt->execute();
$games = $stmt->fetchAll(PDO::FETCH_ASSOC);

$allgames = $db->query('SELECT * FROM games ORDER BY id DESC');
if (isset($_GET['search']) and !empty($_GET['search'])) {
    $recherche = htmlspecialchars($_GET['search']);
    $allgames = $db->query('SELECT * FROM games WHERE name LIKE "%' . $recherche . '%" ORDER BY id DESC');
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
        <h4 class="mt-5">Rechercher le nom du jeux</h4>
        <form method="GET" class="mb-5">
            <input type="search" name="search" placeholder="rechercher">
            <input type="submit" name="chercher" value="Chercher">
        </form>
        <div class="d-flex flex-wrap">
            <?php if ($allgames->rowCount() > 0) {
                foreach ($allgames as $c) : ?>
                    <div class="card mx-2 mb-2" style="width: 18rem;">
                        <div class="card-body ">
                            <h3 class="card-title"><?= $c['name_game']; ?></h3>
                            <h4 class="card-text"><?= $c['price']; ?>€</h4>
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
                <p>Aucun jeux trouvé</p>
            <?php
            }
            ?>
        </div>
    </div>


    <?php include('Components/Footer.php'); ?>

</body>

</html>