<?php
// Start a new session or resume the existing session
session_start();

// Check if a user or admin session is active
if (isset($_SESSION["user"]) || isset($_SESSION["admin"])){
    // Retrieve the user ID from the session
    $answer_user_id = $_SESSION['user_id'];
}

// Check if the form has been submitted with a comment
if(isset($_POST['answer_content'])){
    try {
        // Validate if the comment is empty
        if (empty($_POST['answer_content'])) {
            // Alert the user and redirect back to the posts page
            echo "
            <script>alert('Please comment something')</script>
            <script>window.location = 'posts.php'</script>";
        } else {
            // Include database connection and utility functions
            include 'DatabaseConnection.php';
            include 'DatabaseFunctions.php';

            // Insert the answer into the database
            insertAnswer($pdo, $_POST['answer_content'], $answer_user_id, $_POST['answer_post_id']);
            
            // Redirect back to the posts page after successful insertion
            header('location: posts.php');
        }
    } catch (PDOException $e) {
        // Handle database errors by displaying a custom error message
        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage();
    }
}

// Check if the logged-in user is an admin
if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
    // Include the admin layout template
    include 'templates/admin_layout.html.php';
} else {
    // Include the standard user layout template
    include 'templates/layout.html.php';
}
?>