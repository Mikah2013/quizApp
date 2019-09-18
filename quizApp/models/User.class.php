<?php
//complete code for models/User.class.php

class User {
    
    public function __construct(){
        //start a session
        session_start();
    }

    private $loggedIn = false;

    public function isLoggedIn(){
        $sessionIsSet = isset( $_SESSION['logged_in'] );
        $email = isset( $_SESSION['email'] );
        $firstname = isset( $_SESSION['firstname'] );
        $lastname = isset( $_SESSION['lastname'] );
        if ( $sessionIsSet ) {
            $out = $_SESSION['logged_in'];
            $out .= $_SESSION['email'];
           
        } else {
            $out = false;
        }
        return $out;
    }

    public function login () {
        $_SESSION['logged_in'] = true;
    }

    public function logout () {
        $_SESSION['logged_in'] = false;
        $this->destroySession();
    }

    private function destroySession() {
    $_SESSION=array();
    if (session_id() != "" || isset($_COOKIE[session_name()]))
        setcookie(session_name(), '', time()-2592000, '/');
        session_destroy();
    }
}