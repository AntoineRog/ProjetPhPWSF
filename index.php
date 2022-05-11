<?php

include('Config/db.php');

$response = $db->query('SELECT * FROM games');

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

    <div class="container">
        <h1 class="">Liste des jeux</h1>
        
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>Price</th>
                    <th>Category</th>
                    <th>genre</th>
                    <th>editor</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php while ($data = $response->fetch()) : ?>
                    <tr>
                        <td><?php echo $data['price']; ?></td>
                        <td><?php echo $data['device']; ?></td>
                        <td><?php echo $data['genre']; ?></td>
                        <td><?php echo $data['editor']; ?></td>

                        <td><a href="show.php?id=<?php echo $data['id']; ?>" class="btn">Voir</a></td>
                        <td><a href="update.php?id=<?php echo $data['id']; ?>" class="btn">Modifier</a></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>


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

</html <?php $response->closeCursor(); ?>