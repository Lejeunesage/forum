<?php
session_start();
require('actions/users/securityAction.php');
?>

<!DOCTYPE html>
<html lang="en">
    <?php
    require('includes/head.php');    
    ?>

<body>
    <?php require('includes/navbar.php')  ;?>
    <br>
    <h1>Dashbord</h1>
    <br><br>
    <h5>Bienvenue <?php echo $_SESSION['lastname']." ". $_SESSION['firstname'];?></h5>
</body>
</html>