<?php

require("actions/database.php");
//Validation du formulaire
if (isset($_POST['validate'])) {
    //Vérifier si l'utilisateur à bien renseigner tous les champs
    if (!empty($_POST['pseudo']) 
    && !empty($_POST['lastname'])
    && !empty($_POST['firstname'])
    && !empty($_POST['password'])
    ) {
        //Les données de l'utilisateur
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_lastname = htmlspecialchars($_POST['lastname']);
        $user_firstname = htmlspecialchars($_POST['firstname']);
        $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        //Vérifier si l'utilisateur existe déja sur le site

        $checkIfUsersAlreadyExists = $bdd->prepare("SELECT pseudo FROM users WHERE pseudo = ?");
        $checkIfUsersAlreadyExists->execute([$user_pseudo]);
        if ($checkIfUsersAlreadyExists->rowCount() == 0) {
            //Insérer l'utilisateur dans la base de donnée
            $insertUserOnWebsite = $bdd->prepare("INSERT INTO users(pseudo, lastName, firstName, userpass)VALUES(:pseudo, :lastName, :firstName,:userPass)");

            $insertUserOnWebsite->execute([
                ":pseudo" => $user_pseudo, 
                ":lastName" => $user_lastname, 
                ":firstName" => $user_firstname,
                ":userPass" => $user_password
            ]);

            //Récuperer les informations de l'utilisateur
            $getInfosOfThisUserReq = $bdd->prepare('SELECT id, pseudo, lastName, firstName FROM users WHERE lastName = ? AND firstName = ? AND pseudo = ?');

            $getInfosOfThisUserReq->execute([ $user_lastname, $user_firstname, $user_pseudo]);

             $usersInfos = $getInfosOfThisUserReq->fetch();

            //Authentifier l'utilisateur sur le site et recupérer ses donnée dans des variables globales SESSION
            $_SESSION['auth'] = true;
            $_SESSION['id'] =  $usersInfos['id'];
            $_SESSION['lastname'] =  $usersInfos['lastName'];
            $_SESSION['firstname'] =  $usersInfos['firstName'];
            $_SESSION['pseudo'] =  $usersInfos['pseudo'];

            //Rediriger l'utilisation vers la page d'acceuil
            header('Location: index.php');
        }else {
            $errormsg = "L'utilisateur existe déja sur le site";

        }
    }else {
        $errormsg = "Veuillez completer tout les champs";
    }
}