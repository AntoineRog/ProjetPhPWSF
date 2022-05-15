<?php

include('Config/db.php');

$response = "SELECT * FROM games";
$stmt = $db->prepare($response);
$stmt->execute();
$games = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    <ul class="nav justify-content-end navbar navbar-dark bg-dark">
        <li class="nav-item">
            <a class="nav-link" href="#">Liste des jeux</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Ajouter un jeu</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled">Panier</a>
        </li>
    </ul>

   
    <?php foreach($games as $c) : ?>
    <div class="container">
        <h1 class="">Liste des jeux</h1>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h3 class="card-title"><?= $c['price']; ?></h3>
                <p class="card-text"><?= $c['genre']; ?></p>
                <p class="card-text"><?= $c['editor']; ?></p>
                <p class="card-text"><?= $c['device']; ?></p>
                <a href="show.php?id=<?= $c['id']; ?>" class="btn-light">Voir</a>
                <a href="update.php?id=<?= $c['id']; ?>" class="btn-light">Modifier</a>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

        <footer class="py-3 my-4">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Liste des jeux</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Ajout d'un jeu</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Panier</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
            </ul>
            <p class="text-center text-muted">© 2022 Games</p>
        </footer>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>