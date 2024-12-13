<?php
// Start a new session or resume the existing session
session_start();

try {
    // Include the necessary files for database connection and functions
    include 'DatabaseConnection.php';
    include 'DatabaseFunctions.php';

    // Call the function to delete a module from the database
    // The module ID is passed from the form submission via POST
    deleteModule($pdo, $_POST['module_id']);

    // Redirect to the modules page after successfully deleting the module
    header('location: modules.php');
} catch (PDOException $e) {
    // Handle database-related exceptions
    // Set the error title and output the error message
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
}

// Include the admin layout template after the operation
include 'templates/admin_layout.html.php';
?>