<?php
session_start();
require('actions/database.php');

//Validation du formulaire
if (isset($_POST['validate'])) {
    //Vérifier si l'utilisateur à bien renseigner tous les champs
    if (!empty($_POST['pseudo']) 
    && !empty($_POST['password'])
    ) {
        //Les données de l'utilisateur
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_password = htmlspecialchars($_POST['password']);


        //Vérifier si l'utilisateur exist (si le pseudo est correct)
        $checkIfUserExists = $bdd->prepare("SELECT * FROM users WHERE pseudo = ?");

        $checkIfUserExists->execute([$user_pseudo]);

       if ($checkIfUserExists->rowCount() > 0) {

            //Recupérer les données de l'utilisateur
            $userInfos =  $checkIfUserExists->fetch();

            //Vérifier si le mot de passe est correct
            if (password_verify($user_password, $userInfos['userPass'] )) {
                //Authentifier l'utilisateur sur le site et recupérer ses donnée dans des variables globales SESSION
                $_SESSION['auth'] = true;
                $_SESSION['id'] =  $userInfos['id'];
                $_SESSION['lastname'] =  $userInfos['lastName'];
                $_SESSION['firstname'] =  $userInfos['firstName'];
                $_SESSION['pseudo'] =  $userInfos['pseudo'];

                //Rediriger l'utilisation vers la page d'acceuil
                header('Location: ./index.php');
            }else {
                $errormsg = "Votre mot de passe est incorrect";
            }
       }else {
        $errormsg = "Votre pseudo est incorrect...";
       }
       
    }else {
        $errormsg = "Veuillez completer tout les champs";
    }
}