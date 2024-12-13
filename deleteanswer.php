<?php
// Start a new session or resume the existing one
session_start();

try {
    // Include the necessary files for database connection and functions
    include 'DatabaseConnection.php';
    include 'DatabaseFunctions.php';

    // Call the function to delete an answer from the database
    // The answer ID is passed from the form submission via POST
    deleteAnswer($pdo, $_POST['answer_id']);

    // Redirect to the posts page after successfully deleting the answer
    header('location: posts.php');
} catch (PDOException $e) {
    // Handle database-related exceptions
    // Set the error title and output the error message
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
}

// Include the appropriate layout based on the user's role
if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
    // Include the admin-specific layout template
    include 'templates/admin_layout.html.php';
} else {
    // Include the general user layout template
    include 'templates/layout.html.php';
}
?>