<?php
        $db_username = 'root';
        $db_password = '';
        $pdo = new PDO( 'mysql:host=localhost;dbname=comp1841', $db_username, $db_password );
        if(!$pdo){
                die("Fatal Error: Connection Failed!");
        }
?>