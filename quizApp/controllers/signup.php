<?php
//complete source code for controllers/signup.php

include_once "models/Respondent_Table.class.php";

$createNewUser = isset( $_POST['new-author'] );

if( $createNewUser ) {
    
    $name = $_POST['name'];
    $newEmail = $_POST['email'];
    $newPassword = $_POST['password'];
    $respondentTable = new Respondent_Table( $db );
    try {
        
        $respondentTable->saveRespondent( $newEmail, $name, $newPassword );
        
        $userFormMessage = "$name has been created as a new user with $newEmail as your email!";
    } catch ( Exception $e ) {
        
        $userFormMessage = $e->getMessage();
    }
}

$newSignUpForm = include_once "views/signup-form-html.php";
return $newSignUpForm;