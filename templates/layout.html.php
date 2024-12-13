<!DOCTYPE html>
<html lang="en">
<head>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
        <link rel="stylesheet" href="posts.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
        <title><?=$title?></title>
</head>
<body>
        <div class="container min-vh-100">
                <div class="box">
                    <div style="display: flex;">
                        <h1 class="label3"><b>For Ya Info</b></h1>
                            <button class="label3" type="button"  onclick="logout()" style="border: none; background: none; cursor: pointer; margin-left: auto;" >
                                <i id="logout-icon" class="fas fa-sign-out-alt">Log-out</i>
                            </button>
                        <script>
                            function logout(){
                                window.location.href='login/logout.php'
                            }
                        </script>
                    </div>
                        <h5><a style="color:white; dispaly:flex; margin-left:90%;" href="phpmailer/mail.php">Contact Us.</a></h5>
                        <hr style="border-top:1px line #ccc;"/>
                        <nav>
                            <ul>
                                <li><a class="navigationbutton" style="box-shadow: 0 0 10px rgba(0, 0, 0, 5);" href="posts.php"><b>Home Page</b></a></li>
                                <li><a class="navigationbutton" style="box-shadow: 0 0 10px rgba(0, 0, 0, 5);" href="addpost.php"><b>Post something ?</b></a></li>
                            </ul>
                        </nav>
                        <hr style="border-top:1px groovy #0000;">
                        <div>
                            <script>
                                <?php
                                    if (isset($_SESSION["user"])) {
                                        $user = $_SESSION["user"];
                                    }
                                ?>
                            </script>
                            <br/>
                        </div>
                            <div>
                                <main>
                                    <?=$output?>
                                </main>
                            </div>
                </div>
        </div>
</body>
</html>