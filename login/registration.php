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
            color:cyan;
        }

        #message{
            display:none;
            background: #f1f1f1;
            color: #000;
            position: fixed;
            padding: 20px;
            margin-top: 10px;
            top: 300px;
            right: 225px;
        }
        #message p {
            padding: 10px 35px;
            font-size: 18px;
        }

        .valid {
        color: green;
        }

        .valid:before {
        position: relative;
        left: -35px;
        content: "✔";
        }

        .invalid {
        color: red;
        }

        .invalid:before {
        position: relative;
        left: -35px;
        content: "✖";
        }
        .form-group1{
            display: flex;
            justify-content: center;
        }
    </style>
    <title>Registration</title>
</head>
<body>
    <div class="container">
        <div class="box">
            <h3 class="label1"><b>For Ya Info</b></h3>
            <hr style="border-top:1px dotted #ccc;"/>
            <form action="register_query.php" method="POST">       
                <h4 class="label2">Register here...</h4>
                <hr style="border-top:1px groovy #000;">
                <div class="form-group">
                    <input type="email" class="form-control" name="Email" placeholder="Email (abc@email.com)" />
                </div>
                <br/>
                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="Username"/>
                </div>
                <br/>
                <div class="form-group">
                    <div style="display: flex; align-items:center;">
                        <input type="password" class="form-control" name="password" placeholder="Password" id="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                        <button type="button"  onclick="visitoggle()" style="border: none; background: none; cursor: pointer; margin-left: -40px;">
                            <i id="eye-icon" class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>
                <br/>
                <div class="form-group">
                    <div style="display: flex; align-items:center;">
                        <input type="password" class="form-control" name="con_password" id="conpsw" placeholder="Confirm Password"/>
                        <button type="button"  onclick="visitoggle2()" style="border: none; background: none; cursor: pointer; margin-left: -40px;">
                            <i id="eye-icon2" class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>
                <br />
                <div class="form-group">
                    <button class="btn btn-secondary form-control" name="register">Register</button>
                </div>
                <br/>
                <div class="form-group1">
                    <button class="btn btn-secondary" name="admin_login" onclick="loadadminregister()">Admin Registration</button>
                </div>
                <br/>
                <div class="form-group1">
                    <div class="label1">Already have a account ?</div>
                    <a class="label2" href="login.php">Login</a>
                </div>               
            </form>
                
        </div>
    </div>
    <div id="message">
        <h3>Password must contain the following:</h3>
        <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
        <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
        <p id="number" class="invalid">A <b>number</b></p>
        <p id="length" class="invalid">Minimum <b>8 characters</b></p>
    </div>
    <script>
        var myInput = document.getElementById("psw");
        var letter = document.getElementById("letter");
        var capital = document.getElementById("capital");
        var number = document.getElementById("number");
        var length = document.getElementById("length");


        myInput.onfocus = function() {
        document.getElementById("message").style.display = "block";
        }


        myInput.onblur = function() {
        document.getElementById("message").style.display = "none";
        }


        myInput.onkeyup = function() {

        var lowerCaseLetters = /[a-z]/g;
        if(myInput.value.match(lowerCaseLetters)) {  
            letter.classList.remove("invalid");
            letter.classList.add("valid");
        } else {
            letter.classList.remove("valid");
            letter.classList.add("invalid");
        }
        

        var upperCaseLetters = /[A-Z]/g;
        if(myInput.value.match(upperCaseLetters)) {  
            capital.classList.remove("invalid");
            capital.classList.add("valid");
        } else {
            capital.classList.remove("valid");
            capital.classList.add("invalid");
        }


        var numbers = /[0-9]/g;
        if(myInput.value.match(numbers)) {  
            number.classList.remove("invalid");
            number.classList.add("valid");
        } else {
            number.classList.remove("valid");
            number.classList.add("invalid");
        }
        

        if(myInput.value.length >= 8) {
            length.classList.remove("invalid");
            length.classList.add("valid");
        } else {
            length.classList.remove("valid");
            length.classList.add("invalid");
        }
        }

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
        function visitoggle2(){
            var y = document.getElementById("conpsw");
            var eyeIcon = document.getElementById("eye-icon2");
            if (y.type === "password"){
                y.type = "text"
                eyeIcon.classList.remove("fa-eye");
                eyeIcon.classList.add("fa-eye-slash");
            }else{
                y.type = "password"
                eyeIcon.classList.remove("fa-eye-slash");
                eyeIcon.classList.add("fa-eye");
            }
        }
        function loadadminregister(){
            window.location.href ="admin_registration.php";
        }
    </script>
</body>
</html>