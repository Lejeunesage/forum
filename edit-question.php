<?php
    require('actions/users/securityAction.php');
    require('actions/questions/editQuestionAction.php');
    require('actions/questions/getInfoOfEditedQuestionAction.php');

?>

<!DOCTYPE html>
<html lang="en">
<?php
    require('includes/head.php');  
?>
<body>
<?php
    require('includes/navbar.php');  
?>

<br><br><br>

<div class="container">

    <?php 
        if (isset($errormsg)) {
            echo '<p style="color:red;">' .  $errormsg . '</p>';
        }

        if (isset($question_content)) {
            ?>
                <form  method="post">
        

                    <div class="mb-3">
                        <label class="form-label">Titre de la question</label>
                        <input type="text" class="form-control" name="title" value="<?= $question_title ;?>">
                        
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description de la question</label>
                        <textarea  class="form-control" name="description"><?= $question_description ;?></textarea>
                        
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Contenu de la question</label>
                        <textarea class="form-control" name="content"><?=  $question_content ;?></textarea>
                        
                    </div>
                
                
                    <button type="submit" class="btn btn-primary" name="validate">Modifier la question</button>
                    
                
                </form>
            <?php
        }
    ?>
    
</div>
</body>
</html>