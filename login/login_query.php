<?php
// Start a new session to store session variables
session_start();

// Include the database connection
require_once 'conn.php';

// Handle login request for normal user
if(ISSET($_POST['login'])){
    // Check if both email and password fields are filled
    if($_POST['Email'] != "" || $_POST['password'] != ""){

        // Get the email and password from the form
        $Email = $_POST['Email'];
        $password = $_POST['password'];

        // Prepare SQL query to find a user with the given email
        $sql = "SELECT * FROM `user_profile` WHERE `Email`=?";
        $query = $pdo->prepare($sql);
        $query->execute(array($Email));

        // If the user exists, verify the password
        if($query->rowCount() > 0) {
            $fetch = $query->fetch();

            // Use password_verify to check if the provided password matches the hashed password
            if (password_verify($password, $fetch["user_password"])) {
                // Store session data
                $_SESSION['role'] = $fetch['user_role'];  // Store the user's role
                $_SESSION['user'] = $fetch['user_name'];  // Store the user's name
                $_SESSION['user_id'] = $fetch['user_id'];  // Store the user's ID
                // Redirect to the home page
                header("location: ../index.php");
                exit();
            } else{
                // If password doesn't match, show an alert and redirect to login page
                echo "
                <script>alert('Invalid username or password')</script>
                <script>window.location = 'login.php'</script>
                ";
            }
        }else{
            // If email is not found in the database, show an alert and redirect to login page
            echo "
            <script>alert('Invalid username or password!')</script>
            <script>window.location = 'login.php'</script>
            ";
        }
    }else{
        // If either email or password is empty, show an alert and prompt user to complete the form
        echo "
        <script>alert('Please complete the required field!')</script>
        <script>window.location = 'login.php'</script>
        ";
    }   
}

// Handle login request for admin
if(ISSET($_POST['admin_login'])){
    // Check if both email and password fields are filled
    if($_POST['Email'] != "" || $_POST['password'] != ""){

        // Get the email and password from the form
        $Email = $_POST['Email'];
        $password = $_POST['password'];

        // Prepare SQL query to find a user with the given email
        $sql = "SELECT * FROM `user_profile` WHERE `Email`=?";
        $query = $pdo->prepare($sql);
        $query->execute(array($Email));

        // If the user exists, verify the password
        if($query->rowCount() > 0) {
            $fetch = $query->fetch();

            // Use password_verify to check if the provided password matches the hashed password
            if (password_verify($password, $fetch["user_password"])) {
                // Store session data
                $_SESSION['role'] = $fetch['user_role'];  // Store the user's role
                $_SESSION['user'] = $fetch['user_name'];  // Store the user's name
                $_SESSION['user_id'] = $fetch['user_id'];  // Store the user's ID
                // Redirect to the home page
                header("location: ../index.php");
                exit();
            } else{
                // If password doesn't match, show an alert and redirect to admin login page
                echo "
                <script>alert('Invalid username or password')</script>
                <script>window.location = 'admin_login.php'</script>
                ";
            }
        }else{
            // If email is not found in the database, show an alert and redirect to admin login page
            echo "
            <script>alert('Invalid username or password!')</script>
            <script>window.location = 'admin_login.php'</script>
            ";
        }
    }else{
        // If either email or password is empty, show an alert and prompt user to complete the form
        echo "
        <script>alert('Please complete the required field!')</script>
        <script>window.location = 'admin_login.php'</script>
        ";
    }   
}
?>