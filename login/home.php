<!DOCTYPE html>
<?php
        require 'conn.php';
        session_start();
       
        if(!ISSET($_SESSION['user'])){
                header('location:login.php');
        }
?>
<html lang="en">
        <head>
                <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
                <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
        </head>
<body>
        <div class="col-md-3"></div>
        <div class="col-md-6 well">
                <h3 class="text-primary">PHP - PDO Login and Registration</h3>
                <hr style="border-top:1px dotted #ccc;"/>
                <div class="col-md-2"></div>
                <div class="col-md-8">
                        <h3>Welcome!</h3>
                        <br />
                        <?php
                                $id = $_SESSION['user'];
                                $sql = $pdo->prepare("SELECT * FROM `user_profile` WHERE `user_id`='$id'");
                                $sql->execute();
                                $fetch = $sql->fetch();
                        ?>
                        <center><h4><?php echo $fetch['user_name']?></h4></center>
                        <a href = "logout.php">Logout</a>
                </div>
        </div>
</body>
</html>