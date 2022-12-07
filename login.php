<?php
require("actions/users/loginAction.php");
?>

<!DOCTYPE html>
<html lang="fr">
<?php require("includes/head.php"); ?>
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
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        
        <button type="submit" class="btn btn-primary" name="validate">Se connecter</button>
        
            <br><br>
        <p>Vous n'avez pas de compte ? <a href="signup.php">Inscrivez-vous</a></p>
    </form>
</body>
</html>