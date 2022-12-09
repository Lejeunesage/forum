<?php
require('actions/database.php');

//Vérifier si l'id est bien passer en paramètre dans l'url

if (isset($_GET['id']) && !empty($_GET['id'])) {

    $idOfQuestion = $_GET['id'];

    //Vérifier si la question existe

    $checkIfQuestionExists = $bdd->prepare('SELECT * FROM questions WHERE id = ? ');
    
    $checkIfQuestionExists->execute([$idOfQuestion]);

    if ($checkIfQuestionExists-> rowCount() > 0) {

        //Récuperer les données de la question
        $questionInfos =  $checkIfQuestionExists->fetch(); 

        if ($questionInfos['id_auteur'] === $_SESSION['id']) {


            $question_title = $questionInfos['titre'];
            $question_description = $questionInfos['descriptionText'];
            $question_content = $questionInfos['contenu'];
           
            $question_description = str_replace('<br />', '', $question_description);
            $question_content = str_replace('<br />', '', $question_content);
          
        }else {
            $errormsg = "Vous n'êtes pas l'auteur de cette question";
        }
  
    }else {
        
        $errormsg = "Aucune questions n'a été trouvée";
    }
   
}else {
    $errormsg = "Aucune questions n'a été trouvée";
}