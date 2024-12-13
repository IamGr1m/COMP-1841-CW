<?php
// Start a new session or resume the existing session
session_start();

try {
    // Include the necessary files for database connection and functions
    include 'DatabaseConnection.php';
    include 'DataBaseFunctions.php';

    // Fetch all the modules from the database using the allModules function
    // The $pdo object is passed to interact with the database
    $modules = allModules($pdo);

    // Start output buffering to capture the content of the modules page
    ob_start();

    // Include the template that will render the modules
    include 'templates/modules.html.php';

    // Capture the content and store it in the $output variable
    $output = ob_get_clean();

    // Set the title for the page
    $title = 'Modules Page';
} catch (PDOException $e) {
    // If an error occurs, set the title and output the error message
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
}

// Include the admin layout template after the operation
include 'templates/admin_layout.html.php';
?>