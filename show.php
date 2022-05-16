<?php

include('Config/db.php');

$response = $db->query('SELECT * FROM games WHERE id=' . $_GET['id']);
$data = $response->fetch();
if ($data === false) {
    header('Location: Template/error404.php');
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
    <title>Document</title>
</head>

<body>
<?php include('Components/Header.php'); ?>


    <div class="container px-4 py-5" id="custom-cards">
        <h2 class="pb-2 border-bottom">Custom cards</h2>

        <div class="row row-col-6  g-4 py-5">
            <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-4 shadow-lg" style="background-image: url('unsplash-photo-1.jpg');">
                    <div class="d-flex justify-content-center text-white text-shadow-1">
                        <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold"><?= $data['name']; ?></h2>
                    </div>
                </div>
            </div>
            <div class="col-6 ">
                <div>
                    <h2><?= $data['price']; ?></h2>
                    <h4><?= $data['genre']; ?></h4>
                    <h4><?= $data['editor']; ?></h4>
                    <h4><?= $data['device']; ?></h4>
                    <p><?= $data['description']; ?></p>
                    <a href="update.php" class="btn btn-primary">
                        Modifier
                    </a>
                    <a href="delete.php" class="btn btn-primary">
                        Supprimer
                    </a>
                </div>
            </div>





        </div>
    </div>
    <?php include('Components/Footer.php'); ?>

</body>

</html>