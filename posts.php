<?php
// Start a new session or resume the existing session
session_start();

// Check if the user is logged in and set their user ID from the session
if (isset($_SESSION["user"])) {
    $answer_user_id = $_SESSION['user_id'];
}

// Check if the form has been submitted with the answer content
if (isset($_POST['answer_content'])) {
    try {
        // Check if the answer content is empty
        if (empty($_POST['answer_content'])) {
            echo "
            <script>alert('Please comment something')</script>
            <script>window.location = 'posts.php'</script>";
        } else {
            // Include the database connection and functions
            include 'DatabaseConnection.php';
            include 'DatabaseFunctions.php';

            // Insert the answer into the database using the insertAnswer function
            insertAnswer($pdo, $_POST['answer_content'], $answer_user_id, $_POST['answer_post_id']);
            // Redirect to the posts page after submitting the answer
            header('location: posts.php');
        }
    } catch (PDOException $e) {
        // Catch any database errors and display the error message
        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage();
    }
}

try {
    // Include the necessary files for database connection and functions
    include 'DatabaseConnection.php';
    include 'DataBaseFunctions.php';
    
    // Fetch all posts and answers from the database
    $posts = allPosts($pdo);
    $answers = allAnswers($pdo);

    // Start output buffering to capture the content of the posts page
    ob_start();
    // Include the template to display the posts
    include 'templates/posts.html.php';
    // Capture the content and store it in the $output variable
    $output = ob_get_clean();
    // Set the title for the page
    $title = 'Home Page';
} catch (PDOException $e) {
    // If an error occurs, set the title and output the error message
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
}

// Include the appropriate layout template based on the user's role (admin or other)
if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
    // Include the admin layout template
    include 'templates/admin_layout.html.php';
} else {
    // Include the general layout template
    include 'templates/layout.html.php';
}
?>
