<?php

include('Config/db.php');

$response = "SELECT * FROM editor";
$stmt = $db->prepare($response);
$stmt->execute();
$games = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>
    <?php include('Components/Header.php'); ?>

    <div class="container">
        <h1 class="">Liste des éditeurs</h1>
        <div class="d-flex flex-wrap">
            <?php foreach ($games as $c) : ?>
                <div class="card mx-2 mb-2" style="width: 18rem;">
                    <div class="card-body ">
                        <h3 class="card-title"><?= $c['name']; ?></h3>
                        <h4 class="card-text"><?= $c['country']; ?></h4>
                        <p class="card-text"><?= $c['city']; ?></p>
                        <p class="card-text"><?= $c['description']; ?></p>
                        <a href="showEditor.php?id=<?= $c['id_editor']; ?>" class="btn-light">Voir</a>
                        <a href="updateEditor.php?id=<?= $c['id_editor']; ?>" class="btn-light">Modifier</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    
    <?php include('Components/Footer.php'); ?>

</body>

</html>