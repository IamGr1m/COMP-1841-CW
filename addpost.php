<?php
// Start a new session or resume the existing session
session_start();

// Check if a user session is active and get the user ID
if (isset($_SESSION["user"])) {
    $post_user_id = $_SESSION['user_id'];
}

// Check if the form to submit a post has been submitted
if (isset($_POST['submit'])) {
    try {
        // Validate that all required fields are filled
        if (empty($_POST['post_title']) || empty($_POST['post_content']) || empty($_POST['post_module_id'])) {
            // Alert the user and redirect back to the add post page
            echo "
            <script>alert('All fields are required')</script>
            <script>window.location = 'addpost.php'</script>";
        } else {
            // Handle file upload logic
            $target_dir = "uploads/"; // Directory where files will be saved
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1; // Flag to track upload status
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); // Get file extension

            if (empty($_FILES['fileToUpload']['tmp_name'])) {
                $image = null; // No file uploaded
            } else {
                // Check if the uploaded file is an image
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if ($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "<script>alert('File is not an image.')</script>
                          <script>window.location = 'addpost.php'</script>";
                    $uploadOk = 0;
                }

                // Check if the file already exists
                if (file_exists($target_file)) {
                    echo "<script>alert('Sorry, file already exists.')</script>
                          <script>window.location = 'addpost.php'</script>";
                    $uploadOk = 0;
                } else {
                    // Check file size
                    if ($_FILES["fileToUpload"]["size"] > 500000) {
                        echo "<script>alert('Sorry, your file is too large.')</script>
                              <script>window.location = 'addpost.php'</script>";
                        $uploadOk = 0;
                    } else {
                        // Check file format
                        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                            echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>
                                  <script>window.location = 'addpost.php'</script>";
                            $uploadOk = 0;
                        } else {
                            // Proceed with file upload if all checks pass
                            if ($uploadOk == 0) {
                                header('location: addpost.php');
                                echo "<script>alert('Something wrong.')</script>
                                      <script>window.location = 'addpost.php'</script>";
                                exit;
                            } else {
                                // Move uploaded file to the target directory
                                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                                    $image = $_FILES['fileToUpload']['name'];
                                } else {
                                    echo "<script>alert('Sorry, there was an error uploading your file.')</script>
                                          <script>window.location = 'addpost.php'</script>";
                                }
                            }
                        }
                    }
                }
            }

            // Include database connection and functions
            include 'DatabaseConnection.php';
            include 'DatabaseFunctions.php';

            // Insert the post into the database
            insertPost($pdo, $_POST['post_title'], $_POST['post_content'], $image, $post_user_id, $_POST['post_module_id']);

            // Redirect to the posts page after successful submission
            header('location: posts.php');
        }
    } catch (PDOException $e) {
        // Handle database errors
        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage();
    }
} else {
    // If no form submission, prepare the page for adding a post
    include 'DatabaseConnection.php';
    include 'DatabaseFunctions.php';

    // Set the page title and fetch all available modules
    $title = "Post a post";
    $modules = allModules($pdo);

    // Use output buffering to render the add post template
    ob_start();
    include 'templates/addpost.html.php';
    $output = ob_get_clean();
}

// Include the appropriate layout based on the user role
if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
    include 'templates/admin_layout.html.php';
} else {
    include 'templates/layout.html.php';
}
?>