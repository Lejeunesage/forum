<?php 
    require('actions/users/signupAction.php');
?>
<!DOCTYPE html>
<html lang="fr">
<?php include "includes/head.php"; ?>
<body>
<?php require('includes/navbar.php')  ;?>
    <br><br><br>
    <form class="container" method="post">

        <?php 
            if (isset($errormsg)) {
                echo '<p style="color:red;">' . $errormsg . '</p>';
            }
        ?>

        <div class="mb-3">
            <label class="form-label">Pseudo</label>
            <input type="text" class="form-control" name="pseudo">
            
        </div>
        <div class="mb-3">
            <label class="form-label">Nom</label>
            <input type="text" class="form-control" name="lastname">
            
        </div>
        <div class="mb-3">
            <label class="form-label">Prenom</label>
            <input type="text" class="form-control" name="firstname">
            
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        
        <button type="submit" class="btn btn-primary" name="validate">S'inscrire</button>


        <br><br>
        <p>Vous avez déja un compte ? <a href="login.php">Connectez-vous</a></p>
    </form>

 
</body>
</html>