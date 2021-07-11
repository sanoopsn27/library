<?php
require_once __DIR__.'/db-connect.php';  
require_once __DIR__.'/session.php';  
sec_session_start(); 
 
if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['pass'];
 
    if (login($email, $password, $mysqli) == true) {
        // Login success 
        
        header('Location: index.php');

    } else {
        // Login failed 
        header('Location: login.php?error=1');
    }
} else {
    // The correct POST variables were not sent to this page. 
    echo 'Invalid Request';
}

