<?php

include('Config/db.php');

$req = $db->prepare('DELETE FROM editor WHERE id_editor=:id');
$req->execute([
    'id' => $_GET['id']
]);

header('Location: indexEditor.php');
exit;
