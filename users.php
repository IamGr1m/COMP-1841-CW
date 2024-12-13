<?php
// Start a new session or resume the existing session
session_start();

try {
    // Include the necessary files for database connection and functions
    include 'DatabaseConnection.php';
    include 'DataBaseFunctions.php';
    
    // Fetch all users from the database using the allUsers function
    $users = allUsers($pdo);

    // Start output buffering to capture the content of the users page
    ob_start();

    // Include the template to display the users
    include 'templates/users.html.php';

    // Capture the content and store it in the $output variable
    $output = ob_get_clean();

    // Set the title for the page
    $title = 'Users Page';
} catch (PDOException $e) {
    // If an error occurs, set the title and output the error message
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
}

// Include the admin layout template after the operation
include 'templates/admin_layout.html.php';
?>