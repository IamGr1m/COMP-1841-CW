<?php
// Start the session to store session variables
session_start();

// Include the database connection
require_once 'conn.php';

// Handle user registration
if(ISSET($_POST['register'])){
    // Check if all required fields are filled
    if($_POST['Email'] != "" and $_POST['username'] != "" and $_POST['password'] != "" and $_POST['con_password'] != ""){

        // Check if the passwords match
        if($_POST['password'] == $_POST['con_password']){
            // Get the form data
            $Email = $_POST['Email'];
            $username = $_POST['username'];
            // Hash the password before storing it
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $user = 'user';

            // Check if the email already exists in the database
            $stmt = $pdo->prepare('SELECT * FROM user_profile WHERE Email = :Email');
            $stmt->execute(['Email' => $Email]);
            $row = $stmt->rowCount();
            
            // If the email exists, show an error message
            if($row > 0){
                echo "
                <script>alert('Email already existed')</script>
                <script>window.location = 'registration.php'</script>
                ";
            } else {
                try {
                    // Insert the new user into the database
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "INSERT INTO `user_profile` VALUES ('', '$username', '$Email', '$password', '$user', CURDATE())";
                    $pdo->exec($sql);
                } catch(PDOException $e) {
                    // Handle any errors during the database insertion
                    echo $e->getMessage();
                }
                // Set a success message in the session
                $_SESSION['message'] = array("text" => "User successfully created.", "alert" => "info");
                $pdo = null;
                // Redirect to login page after successful registration
                header('location:login.php');
            }

        } else {
            // If passwords don't match, show an error message
            echo "
            <script>alert('Password does not match')</script>
            <script>window.location = 'registration.php'</script>
            ";
        }
    } else {
        // If any required field is empty, show an error message
        echo "
        <script>alert('Please fill up the required field!')</script>
        <script>window.location = 'registration.php'</script>
        ";
    }
}

// Handle admin registration
if(ISSET($_POST['admin_register'])){
    // Check if all required fields are filled
    if($_POST['Email'] != "" and $_POST['username'] != "" and $_POST['password'] != "" and $_POST['con_password'] != ""){

        // Check if the passwords match
        if($_POST['password'] == $_POST['con_password']){
            // Get the form data
            $Email = $_POST['Email'];
            $username = $_POST['username'];
            // Hash the password before storing it
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $user = 'admin';

            // Check if the email already exists in the database
            $stmt = $pdo->prepare('SELECT * FROM user_profile WHERE Email = :Email');
            $stmt->execute(['Email' => $Email]);
            $row = $stmt->rowCount();
            
            // If the email exists, show an error message
            if($row > 0){
                echo "
                <script>alert('Email already existed')</script>
                <script>window.location = 'admin_registration.php'</script>
                ";
            } else {
                try {
                    // Insert the new admin into the database
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "INSERT INTO `user_profile` VALUES ('', '$username', '$Email', '$password', '$user', CURDATE())";
                    $pdo->exec($sql);
                } catch(PDOException $e) {
                    // Handle any errors during the database insertion
                    echo $e->getMessage();
                }
                // Set a success message in the session
                $_SESSION['message'] = array("text" => "Admin successfully created.", "alert" => "info");
                $pdo = null;
                // Redirect to admin login page after successful registration
                header('location:admin_login.php');
            }

        } else {
            // If passwords don't match, show an error message
            echo "
            <script>alert('Password does not match')</script>
            <script>window.location = 'admin_registration.php'</script>
            ";
        }
    } else {
        // If any required field is empty, show an error message
        echo "
        <script>alert('Please fill up the required field!')</script>
        <script>window.location = 'admin_registration.php'</script>
        ";
    }
}
?>