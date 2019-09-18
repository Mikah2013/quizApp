<?php
//complete source code for controllers/admin/signup.php

include_once "models/User_Table.class.php";

$createNewUser = isset( $_POST['new-author'] );
if( $createNewUser ) {
    
    $name = $_POST['name'];
    $newEmail = $_POST['email'];
    $newPassword = $_POST['password'];
    $userTable = new User_Table( $db );
    try {
        
        $userTable->saveUser( $newEmail, $name, $newPassword );
        
        $userFormMessage = "$name has been created as a new user with $newEmail as your email!";
    } catch ( Exception $e ) {
        
        $userFormMessage = $e->getMessage();
    }
}

$newSignUpForm = include_once "views/admin/signup-form-html.php";
return $newSignUpForm;