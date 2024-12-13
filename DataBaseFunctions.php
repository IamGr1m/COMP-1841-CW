<?php
// Function to execute a query with prepared statements and parameters
function query($pdo, $sql, $parameters = []){
    $query = $pdo ->prepare($sql);  // Prepare the SQL query
    $query -> execute($parameters); // Execute with parameters
    return $query;                  // Return the query result
}

// Function to fetch a single post by its ID
function getPost($pdo, $post_id){
    $parameters = [':post_id' => $post_id];  // Define parameters
    $query = query($pdo, 'SELECT * FROM post WHERE post_id=:post_id', $parameters);  // Run query
    return $query -> fetch();  // Fetch and return the result
}

// Function to fetch a single module by its ID
function getModule($pdo, $module_id){
    $parameters = [':module_id' => $module_id];  // Define parameters
    $query = query($pdo, 'SELECT * FROM module WHERE module_id=:module_id', $parameters);  // Run query
    return $query -> fetch();  // Fetch and return the result
}

// Function to update a post by its ID
function updatePost($pdo, $post_id, $post_title, $post_content){
    $query = 'UPDATE post SET post_content = :post_content, post_title = :post_title WHERE post_id=:post_id';  // SQL query
    $parameters = [':post_content' => $post_content, ':post_title'=> $post_title, ':post_id' => $post_id];  // Parameters
    $query = query($pdo, $query, $parameters);  // Execute update query
}

// Function to update a module by its ID
function updateModule($pdo, $module_id, $module_name){
    $query = 'UPDATE module SET module_name = :module_name WHERE module_id=:module_id';  // SQL query
    $parameters = [':module_name' => $module_name, ':module_id' => $module_id];  // Parameters
    $query = query($pdo, $query, $parameters);  // Execute update query
}

// Function to delete a post by its ID
function deletePost($pdo, $post_id){
    $parameters = [':post_id' => $post_id];  // Parameters
    query($pdo, 'DELETE FROM post WHERE post_id = :post_id', $parameters);  // Execute delete query
}

// Function to delete a user by its ID
function deleteUser($pdo, $user_id){
    $parameters = [':user_id' => $user_id];  // Parameters
    query($pdo, 'DELETE FROM user_profile WHERE user_id = :user_id', $parameters);  // Execute delete query
}

// Function to delete an answer by its ID
function deleteAnswer($pdo, $answer_id){
    $parameters = [':answer_id' => $answer_id];  // Parameters
    query($pdo, 'DELETE FROM answer WHERE answer_id = :answer_id', $parameters);  // Execute delete query
}

// Function to delete a module by its ID
function deleteModule($pdo, $module_id){
    $parameters = [':module_id' => $module_id];  // Parameters
    query($pdo, 'DELETE FROM module WHERE module_id = :module_id', $parameters);  // Execute delete query
}

// Function to insert a new post
function insertPost($pdo, $post_title, $post_content, $fileToUpload, $post_user_id, $post_module_id){
    $query = 'INSERT INTO post (post_title, post_content, post_image, post_creation_date, post_user_id, post_module_id)
    VALUES (:post_title, :post_content, :fileToUpload, CURDATE(), :post_user_id, :post_module_id)';  // SQL query
    $parameters = [':post_title' => $post_title, ':post_content' => $post_content, ':fileToUpload' => $fileToUpload, 
                  ':post_user_id' => $post_user_id, ':post_module_id' => $post_module_id];  // Parameters
    query($pdo, $query, $parameters);  // Execute insert query
}

// Function to insert a new answer
function insertAnswer($pdo, $answer_content, $answer_user_id, $answer_post_id){
    $query = 'INSERT INTO answer (answer_content, answer_date, answer_user_id, answer_post_id)
    VALUES (:answer_content, CURDATE(), :answer_user_id, :answer_post_id)';  // SQL query
    $parameters = [':answer_content' => $answer_content, ':answer_user_id' => $answer_user_id, ':answer_post_id' => $answer_post_id];  // Parameters
    query($pdo, $query, $parameters);  // Execute insert query
}

// Function to insert a new module
function insertModule($pdo, $module_name){
    $query = 'INSERT INTO module (module_name)
    VALUES (:module_name)';  // SQL query
    $parameters = [':module_name' => $module_name];  // Parameters
    query($pdo, $query, $parameters);  // Execute insert query
}

// Function to fetch all users with the role 'user'
function allUsers($pdo){
    $user_role = 'user';  // Define the user role
    $parameters = [':user_role' => $user_role];  // Parameters
    $users = query($pdo, 'SELECT * FROM user_profile WHERE user_role =:user_role', $parameters);  // Run query
    return $users->fetchAll();  // Fetch and return all users
}

// Function to fetch all modules
function allModules($pdo){
    $modules = query($pdo, 'SELECT * FROM module');  // Run query
    return $modules->fetchAll();  // Fetch and return all modules
}

// Function to fetch all posts with user and module details
function allPosts($pdo){
    $posts = query($pdo, 'SELECT post.post_id, post_title, post_content, post_image, post_creation_date, post_user_id, user_name, Email, module_name FROM post
    INNER JOIN user_profile ON post.post_user_id = user_profile.user_id
    INNER JOIN module ON post.post_module_id = module.module_id
    ORDER BY post_id DESC');  // Run query
    return $posts->fetchAll();  // Fetch and return all posts
}

// Function to fetch all answers with user and post details
function allAnswers($pdo){
    $answers = query($pdo, 'SELECT answer.answer_id, answer_content, answer_date, answer_post_id, answer_user_id, user_name, Email, post_id FROM answer
    INNER JOIN user_profile ON answer.answer_user_id = user_profile.user_id
    INNER JOIN post ON answer.answer_post_id = post.post_id
    ORDER BY post_id');  // Run query
    return $answers->fetchAll();  // Fetch and return all answers
}
?>