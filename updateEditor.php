<?php

include('Config/db.php');

if (
    $_POST &&
    isset($_POST['name']) && $_POST['name'] !== '' &&
    isset($_POST['description']) && $_POST['description'] !== '' &&
    isset($_POST['country']) && $_POST['country'] !== '' &&
    isset($_POST['city']) && $_POST['city'] !== ''
) {
    $req = $db->prepare('UPDATE editor SET name =:name, description = :description, country = :country, city = :city WHERE id='  . $_GET['id']);

    $req->execute([
        'name' => $_POST['name'],
        'description' => $_POST['description'],
        'country' => $_POST['country'],
        'city' => $_POST['city']
    ]);

    header('Location: indexEditor.php');
    exit;
} else {
    $response = $db->query('SELECT * FROM editor WHERE id_editor=' . $_GET['id']);
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
            <label class="form-label">Nom de l'editor</label>
            <input type="text" name="name" class="form-control" value="<?php echo $data['name']; ?>">
        </div>
        <div class=" mb-2">
            <label class="form-label">Description</label>
            <input type="text" name="description" class="form-control" value="<?php echo $data['description']; ?>">
        </div>
        <div class="mb-2">
            <label class="form-label">Country</label>
            <input type="text" name="price" class="form-control" value="<?php echo $data['country']; ?>">
        </div>
        <div class="mb-2">
            <label class="form-label">City</label>
            <input type="text" name="device" class="form-control" value="<?php echo $data['city']; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <?php include('Components/Footer.php'); ?>
</body>

</html>