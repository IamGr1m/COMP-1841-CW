<?php
// Start a new session or resume the existing session
session_start();

// Include the necessary files for database connection and functions
include 'DatabaseConnection.php';   
include 'DatabaseFunctions.php';

try {
    // Check if the post title and content are set via the form submission (POST request)
    if (isset($_POST['post_title']) && isset($_POST['post_content'])) {
        // Call the function to update the post in the database with the provided title and content
        // The post ID is passed to identify which post to update
        updatePost($pdo, $_POST['post_id'], $_POST['post_title'], $_POST['post_content']);

        // Redirect to the posts page after updating the post
        header('location: posts.php');
    } else {
        // If the form is not submitted, retrieve the existing post details to populate the edit form
        $post = getPost($pdo, $_GET['post_id']);
        
        // Set the page title for editing the post
        $title = 'Edit Post';

        // Start output buffering to capture the content of the form
        ob_start();

        // Include the template for editing the post
        include 'templates/editpost.html.php';

        // Capture the content and store it in the $output variable
        $output = ob_get_clean();
    }
} catch (PDOException $e) {
    // If a database error occurs, set the title and output the error message
    $title = 'Error has occurred';
    $output = 'Error editing post: ' . $e->getMessage();
}

// Include the appropriate layout based on the user's role (admin or other)
if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
    // Include the admin layout template
    include 'templates/admin_layout.html.php';
} else {
    // Include the general layout template
    include 'templates/layout.html.php';
}
?>