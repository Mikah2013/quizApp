<?php
//complete source code for controllers/signup.php

include_once "models/Respondent_Table.class.php";
include_once "models/User.class.php";

$loginProblem = "";
$editorSuccessMessage = "";

$signinFormSubmitted = isset( $_POST['signin'] );
if( $signinFormSubmitted && $user) {    
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $respondentTable = new Respondent_Table( $db );
    try {
        
        
        $userData = $respondentTable->checkCredentials( $email, $password );
        $user->login();
        $userEntry = $respondentTable->getRespondent( $email );
        $oneEntry = $userEntry->fetch();

        $_SESSION['email'] = $email;
        $_SESSION['name'] = $name = $oneEntry[1];          
        

    } catch ( Exception $e ) {

       $loginProblem = "Login Failed Your Email and Password do not match!";           
    }
    
}

if ( $user->isLoggedIn() ) {

    header('location: index.php');

    
} else {

    $newSignInForm = include_once "views/signin-form-html.php";

    $newSignInForm .= include_once "controllers/signup.php";
}

return $newSignInForm;