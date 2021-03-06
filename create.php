<?php

if (
    $_POST &&
    isset($_POST['name_game']) && $_POST['name_game'] !== '' &&
    isset($_POST['description_game']) && $_POST['description_game'] !== '' &&
    isset($_POST['price']) && $_POST['price'] !== '' && is_numeric($_POST['price']) &&
    isset($_POST['device']) && $_POST['device'] !== '' &&
    isset($_POST['genre']) && $_POST['genre'] !== '' &&
    isset($_POST['editor']) && $_POST['editor'] !== ''
) {
    include('Config/db.php');

    $req = $db->prepare('INSERT INTO games(name_game, description_game, price, device, genre, editor) VALUES (:name_game, :description_game, :price, :device, :genre, :editor)');

    $req->execute([
        'name_game' => $_POST['name_game'],
        'description_game' => $_POST['description_game'],
        'price' => $_POST['price'],
        'device' => $_POST['device'],
        'genre' => $_POST['genre'],
        'editor' => $_POST['editor']
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
            <label class="form-label">Nom du Jeu</label>
            <input type="text" name="name_game" class="form-control">
        </div>
        <div class="mb-2">
            <label class="form-label">Description</label>
            <input type="text" name="description_game" class="form-control">
        </div>
        <div class="mb-2">
            <label class="form-label">Prix</label>
            <input type="number" name="price" class="form-control">
        </div>
        <div class="mb-2">
            <label class="form-label">Device</label>
            <input type="text" name="device" class="form-control">
        </div>
        <div class="mb-2">
            <label class="form-label">Genre</label>
            <input type="text" name="genre" class="form-control">
        </div>
        <div class="mb-2">
            <label class="form-label">Editor</label>
            <input type="text" name="editor" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <?php include('Components/Footer.php'); ?>
</body>

</html>