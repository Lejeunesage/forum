<?php
require('actions/database.php');

//Validationd du formulaire
if (isset($_POST['validate'])) {
    //Vérifiez si les champs spnt remplis
    if (!empty($_POST['title'])
    && !empty($_POST['description'])
    && !empty($_POST['content'])
    ) {
        //Les données à faire passer dans la requete
       $new_question_titre = nl2br(htmlspecialchars($_POST['title']));
       $new_question_description = nl2br(htmlspecialchars($_POST['description']));
       $new_question_content = nl2br(htmlspecialchars($_POST['content']));
        // Modifier les informations de la questions qui possède l'id rentrer en paremètre
       $editQuestionOnWebsite = $bdd->prepare('UPDATE questions SET titre = ?, descriptionText = ? WHERE id = ?');

       $editQuestionOnWebsite->execute(array($_GET['id']));
        //Redirection vers la page d'affichage des questions de l'utilisateur
       header('Location: my-questions.php');
    }else {
        $errormsg = "Veuillez completer tout les champs";
    }
}