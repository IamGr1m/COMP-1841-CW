<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
        <style>
            .container {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh; 
            }
            .box {
                border: 2px solid #ccc; 
                padding: 20px; 
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 5); 
                width: 100%; 
                max-width: 400px; 
                background: transparent;
                backdrop-filter: blur(15px);
            }
            body {
            background-image: url('https://media1.giphy.com/media/v1.Y2lkPTc5MGI3NjExZWdtZDllNjExMG5kZms3eDVoMWVwcWgycW0wdXFya2lleG5lbnl1MiZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/YbS3KkZSFGUkB4XO1X/giphy.webp');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            height: 100vh;
            margin: 0;
        }      
                .label1{
                        text-align: center;
                        color:white;
                }
                .label2{
                        text-align: center;
                        color: cyan;
                }
        .form-group1{
                display: flex;
                justify-content: center;
        }
        .form-group2{
                color: white;
        }
        </style>
        <title>Login</title>
</head>
<body>
        <div class="container">
                <div class="box">
                        <h1 class="label1"><b>For Ya Info</b></h1>
                        <hr style="border-top:1px dotted #ccc;"/>
                        <?php if(isset($_SESSION['message'])): ?>
                                <div class="alert alert-<?php echo $_SESSION['message']['alert'] ?> msg"><?php echo $_SESSION['message']['text'] ?></div>
                        <script>
                                (function() {
                                        setTimeout(function(){
                                                document.querySelector('.msg').remove();
                                        },3000)
                                })();
                        </script>
                        <?php
                                endif;
                                unset($_SESSION['message']);
                        ?>
                        <form action="login_query.php" method="POST">  
                                <h5 class="label2">Login here...</h5>
                                <hr style="border-top:1px groovy #0000;">
                                <div class="form-group2">
                                        <input type="email" class="form-control" name="Email" placeholder="Email (abc@email.com)"/>
                                </div>
                                <br/>
                                <div class="form-group2">
                                        <div style="display: flex; align-items:center;">
                                                <input type="password" class="form-control" name="password" placeholder="Password" id="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                                                <button type="button"  onclick="visitoggle()" style="border: none; background: none; cursor: pointer; margin-left: -40px;">
                                                        <i id="eye-icon" class="fas fa-eye"></i>
                                                </button>
                                        </div>
                                </div>
                                <br />
                                <div class="form-group">
                                        <button class="btn btn-secondary form-control" name="login">Login</button>
                                </div>
                                <br/>
                                <div class="label1">------OR------</div>
                                <br/>
                        </form>
                                <div class="form-group1">
                                        <button class="btn btn-secondary" name="admin_login" onclick="loadadminlogin()">Admin Login</button>
                                </div>
                                <br/>
                                <div class="form-group1">
                                        <div class="label1"><b>Need an account ?</b></div>
                                        <a class="label2" href="registration.php"><b>Registration</b></a>
                                </div>
                        </div>
                </div>
        </div>
        <script>
                function visitoggle(){
            var x = document.getElementById("psw");
            
            var eyeIcon = document.getElementById("eye-icon");
            if (x.type === "password"){
                x.type = "text"
                eyeIcon.classList.remove("fa-eye");
                eyeIcon.classList.add("fa-eye-slash");
            }else{
                x.type = "password"
                eyeIcon.classList.remove("fa-eye-slash");
                eyeIcon.classList.add("fa-eye");
            }
                }
                function loadadminlogin(){
                        window.location.href="admin_login.php"
                }
        </script>
</body>
</html>
