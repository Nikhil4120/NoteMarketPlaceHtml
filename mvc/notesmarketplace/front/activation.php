<?php

session_start();

include '../db.php';

if(isset($_GET['token'])) {
    $token = $_GET['token'];
    
    
    
    $updatequery = "UPDATE users SET IsEmailVerified = 1 WHERE emailid = '$token'";
    
    $query = mysqli_query($connection, $updatequery);
    
    if($query) {
        if(isset($_SESSION['msg'])){
            $_SESSION['msg'] = "Account updated successfully";
            header('location: login.php');
        }else {
            $_SESSION['msg'] = "You are logged out.";
            header('location: login.php');
        }
    }else {
        
        $_SESSION['msg'] = "Account not updated"; 
        header('location: login.php'); 
    }
}
?>