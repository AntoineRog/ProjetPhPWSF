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
    <?php include('Components/Header.php'); ?>

        <div class="container">
            <h1 class="">Liste des jeux</h1>
            <?php foreach ($games as $c) : ?>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h3 class="card-title"><?= $c['name']; ?></h3>
                    <h4 class="card-text"><?= $c['price']; ?></h4>
                    <p class="card-text"><?= $c['genre']; ?></p>
                    <p class="card-text"><?= $c['editor']; ?></p>
                    <p class="card-text"><?= $c['device']; ?></p>
                    <a href="show.php?id=<?= $c['id']; ?>" class="btn-light">Voir</a>
                    <a href="update.php?id=<?= $c['id']; ?>" class="btn-light">Modifier</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>


    <?php include('Components/Footer.php'); ?>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>