<?php  

require("actions/questions/publishQuestionAction.php"); 
require("actions/users/securityAction.php"); 

?>
<!DOCTYPE html>
<html lang="en">
<?php
    require('includes/head.php');
?>
<body>

<?php require('includes/navbar.php')  ;?>
    <br><br><br>
    <form class="container" method="post">

    <?php 
        if (isset($errormsg)) {
            echo '<p style="color:red;">' .  $errormsg . '</p>';
        }elseif (isset($successmsg)) {
            echo '<p style="color:red;">' .  $successmsg . '</p>';
        }
    ?>

    <div class="mb-3">
        <label class="form-label">Titre de la question</label>
        <input type="text" class="form-control" name="title">
        
    </div>
    <div class="mb-3">
        <label class="form-label">Description de la question</label>
        <textarea  class="form-control" name="description"></textarea>
        
    </div>
    <div class="mb-3">
        <label class="form-label">Contenu de la question</label>
        <textarea class="form-control" name="content"></textarea>
        
    </div>
   

    <button type="submit" class="btn btn-primary" name="validate">Publier la question</button>


    </form>
</body>
</html>