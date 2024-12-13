<?php
// Include the necessary files for database connection and functions
include 'DatabaseConnection.php';
include 'DatabaseFunctions.php';

// Check if the form has been submitted with a module name
if (isset($_POST['module_name'])) {
    try {
        // Call the function to update the module in the database
        // The module ID and name are passed from the form submission via POST
        updateModule($pdo, $_POST['module_id'], $_POST['module_name']);
        
        // Redirect to the modules page after successfully updating the module
        header('location: modules.php');
    } catch (PDOException $e) {
        // Handle database-related exceptions
        // Set the error title and output the error message
        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage();
    }
} else {
    // If the form is not submitted, fetch the module data based on the module ID from the URL
    $module = getModule($pdo, $_GET['module_id']);
    
    // Set the page title for editing a module
    $title = "Edit module";
    
    // Start output buffering to capture the content of the form
    ob_start();
    
    // Include the template for editing the module
    include 'templates/editmodule.html.php';
    
    // Get the captured content and store it in the $output variable
    $output = ob_get_clean();
}

// Include the admin layout template after the operation
include 'templates/admin_layout.html.php';
?>