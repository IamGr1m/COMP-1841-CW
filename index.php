<?php
session_start();
if ($_SESSION['role'] == 'user'){
    header('location: posts.php');
}elseif ($_SESSION['role'] == 'admin'){
    header('location: posts.php');
}else{
    header('location:login/login.php');
}