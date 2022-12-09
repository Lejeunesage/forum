<?php

require('actions/database.php');

$getAllMyQuestions = $bdd->prepare('SELECT id, titre, descriptionText FROM questions WHERE id_auteur = ? ORDER BY id DESC');

$getAllMyQuestions->execute([
    $_SESSION['id']
]);



?>