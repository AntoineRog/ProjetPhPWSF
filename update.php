<?php

include('Config/db.php');

if (
    $_POST &&
    isset($_POST['name_game']) && $_POST['name_game'] !== '' &&
    isset($_POST['description_game']) && $_POST['description_game'] !== '' &&
    isset($_POST['price']) && $_POST['price'] !== '' && is_numeric($_POST['price']) &&
    isset($_POST['device']) && $_POST['device'] !== '' &&
    isset($_POST['genre']) && $_POST['genre'] !== '' &&
    isset($_POST['editor']) && $_POST['editor'] !== ''
) {
    $req = $db->prepare('UPDATE games SET name_game =:name_game, description_game = :description_game, price = :price, device = :device, genre = :genre, editor = :editor WHERE id='  . $_GET['id']);

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
} else {
    $response = $db->query('SELECT * FROM games WHERE id=' . $_GET['id']);
    $data = $response->fetch();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Update</title>
</head>

<body>
    <?php include('Components/Header.php'); ?>

    <form class="container" style=" width: 25%;" method="POST">
        <div class="mb-2">
            <label class="form-label">Nom du Jeu</label>
            <input type="text" name="name" class="form-control" value="<?php echo $data['name_game']; ?>">
        </div>
        <div class=" mb-2">
            <label class="form-label">Description</label>
            <input type="text" name="description" class="form-control" value="<?php echo $data['description_game']; ?>">
        </div>
        <div class="mb-2">
            <label class="form-label">Prix</label>
            <input type="number" name="price" class="form-control" value="<?php echo $data['price']; ?>">
        </div>
        <div class="mb-2">
            <label class="form-label">Device</label>
            <input type="text" name="device" class="form-control" value="<?php echo $data['device']; ?>">
        </div>
        <div class="mb-2">
            <label class="form-label">Genre</label>
            <input type="text" name="genre" class="form-control" value="<?php echo $data['genre']; ?>">
        </div>
        <div class="mb-2">
            <label class="form-label">Editor</label>
            <input type="text" name="editor" class="form-control" value="<?php echo $data['editor']; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <?php include('Components/Footer.php'); ?>
</body>

</html>