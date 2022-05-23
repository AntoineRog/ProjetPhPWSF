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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Show</title>
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
                    <a href="update.php?id=<?= $data['id']; ?>" class="btn btn-primary">
                        Modifier
                    </a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal">
                        Supprimer
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Suppression <?php echo $data['name'] ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Êtes-vous sure de vouloir suprrimer le jeu: <?php echo $data['name'] ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <a href="delete.php?id=<?= $data['id']; ?>" class="btn btn-primary">
                                        Supprimer
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php include('Components/Footer.php'); ?>

</body>

</html>