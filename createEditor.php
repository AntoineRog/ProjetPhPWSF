<?php

if (
    $_POST &&
    isset($_POST['name']) && $_POST['name'] !== '' &&
    isset($_POST['description']) && $_POST['description'] !== '' &&
    isset($_POST['country']) && $_POST['country'] &&
    isset($_POST['city']) && $_POST['city'] !== ''
) {
    include('Config/db.php');

    $req = $db->prepare('INSERT INTO games(name, description, country, city) VALUES (:name, :description, :country, :city)');

    $req->execute([
        'name' => $_POST['name'],
        'description' => $_POST['description'],
        'city' => $_POST['city'],
        'country' => $_POST['country']
    ]);

    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Création</title>
</head>

<body>
    <?php include('Components/Header.php'); ?>

    <form class="container" style=" width: 25%;" method="POST">
        <div class="mb-2">
            <label class="form-label">Nom</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="mb-2">
            <label class="form-label">Description</label>
            <input type="text" name="description" class="form-control">
        </div>
        <div class="mb-2">
            <label class="form-label">Ville</label>
            <input type="number" name="price" class="form-control">
        </div>
        <div class="mb-2">
            <label class="form-label">Pays</label>
            <input type="text" name="device" class="form-control">
        </div>

    </form>

    <?php include('Components/Footer.php'); ?>
</body>

</html>