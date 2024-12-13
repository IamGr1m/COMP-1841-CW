<?php
// Start a new session or resume the existing one
session_start();

// Check if the form for adding a module has been submitted
if(isset($_POST['module_name'])){
    try {
        // Validate if the module name field is empty
        if (empty($_POST['module_name'])){
            // Alert the user that all fields are required and redirect to the add post page
            echo "
            <script>alert('All fields are required')</script>
            <script>window.location = 'addpost.php'</script>";
        } else {
            // Include the database connection and functions
            include 'DatabaseConnection.php';
            include 'DatabaseFunctions.php';

            // Insert the new module into the database
            insertModule($pdo, $_POST['module_name']);

            // Redirect to the modules page after successful insertion
            header('location: modules.php');
        }
    } catch (PDOException $e) {
        // Handle database-related errors by defining error variables
        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage();
    }
} else {
    // If no form submission, prepare the page for adding a new module
    include 'DatabaseConnection.php';
    include 'DatabaseFunctions.php';

    // Set the page title
    $title = "Add a module";

    // Use output buffering to capture the template content
    ob_start();
    include 'templates/addmodule.html.php';
    $output = ob_get_clean();
}

// Include the admin layout template to render the page
include 'templates/admin_layout.html.php';
?>