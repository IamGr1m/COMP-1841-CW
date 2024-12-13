<?php
// Start a new session or resume the existing session
session_start();

try {
    // Include the necessary files for database connection and functions
    include 'DatabaseConnection.php';
    include 'DatabaseFunctions.php';

    // Call the function to delete a user from the database
    // The user ID is passed from the form submission via POST
    deleteUser($pdo, $_POST['user_id']);

    // Redirect to the users page after successfully deleting the user
    header('location: users.php');
} catch (PDOException $e) {
    // Handle database-related exceptions
    // Set the error title and output the error message
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
}

// Include the admin layout template after the operation
include 'templates/admin_layout.html.php';
?>