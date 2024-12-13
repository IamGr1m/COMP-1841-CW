<?php
// Start a new session or resume the existing session
session_start();

try {
    // Include the necessary files for database connection and functions
    include 'DatabaseConnection.php';
    include 'DatabaseFunctions.php';

    // Call the function to delete a post from the database
    // The post ID is passed from the form submission via POST
    deletePost($pdo, $_POST['post_id']);

    // Redirect to the posts page after successfully deleting the post
    header('location: posts.php');
} catch (PDOException $e) {
    // Handle database-related exceptions
    // Set the error title and output the error message
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
}

// Include the appropriate layout based on the user's role
if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
    // Include the admin layout template
    include 'templates/admin_layout.html.php';
} else {
    // Include the general user layout template
    include 'templates/layout.html.php';
}
?>