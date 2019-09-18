<?php
//complete source code for controllers/admin/signup.php

include_once "models/User_Table.class.php";
include_once "models/User.class.php";

$loginProblem = "";
$editorSuccessMessage = "";

$signinFormSubmitted = isset( $_POST['signin'] );
if( $signinFormSubmitted && $user) {    
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $userTable = new User_Table( $db );
    try {
        
        
        $userData = $userTable->checkCredentials( $email, $password );
        $user->login();
        $userEntry = $userTable->getUser( $email );
        $oneEntry = $userEntry->fetch();

        $_SESSION['email'] = $email;
        $_SESSION['name'] = $name = $oneEntry[1];          
        

    } catch ( Exception $e ) {

       $loginProblem = "Login Failed Your Email and Password do not match!";           
    }
    
}

if ( $user->isLoggedIn() ) {

    header('location: admin.php');

    
} else {

    $newSignInForm = include_once "views/admin/signin-form-html.php";

    $newSignInForm .= include_once "controllers/admin/signup.php";
}

return $newSignInForm;