<?php 
    require('actions/users/securityAction.php')  ;
    require('actions/questions/myQuestionsAction.php')  ;

;?>
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
            while ($question = $getAllMyQuestions->fetch()) {
            ?>

                <div class="card ">
                    <h5 class="card-header">
                        <?= $question['titre']?>
                    </h5>
                    <div class="card-body">
                        
                        <p class="card-text">
                                <?= $question['descriptionText']?>
                        </p>
                        <a href="#" class="btn btn-primary">Accéder à la question</a>
                        <a href="edit-question.php" class="btn btn-warning">Modifier la question</article></a>
                    </div>
            </div>
            <br>
            <?php
            }
            
            
            ?>
    </div>
    
</body>
</html>  