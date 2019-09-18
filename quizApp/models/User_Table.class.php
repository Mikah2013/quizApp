<?php
//complete code listing for models/User_Table.class.php

include_once "models/Table.class.php";

class User_Table extends Table {
    
    public function saveUser ( $email, $name, $password ) {
        //check if e-mail is available
        $this->checkEmail( $email );
        $SQL = "INSERT INTO admin ( email, name, password ) VALUES ( ?,?, MD5(?) )";
        $data= array( $email, $name, $password );
        $this->makeStatement( $SQL, $data );
    }

    private function checkEmail ($email) {
        $SQL = "SELECT email FROM admin WHERE email = ?";
        $data = array( $email );
        $this->makeStatement( $SQL, $data );
        $statement = $this->makeStatement( $SQL, $data );
        //if a user with that e-mail is found in database
        if ( $statement->rowCount() === 1 ) {
            //throw an exception > do NOT create new admin user
            $e = new Exception("Error: '$email' already used!");
            throw $e;
        }
    }

    public function checkCredentials ( $email, $password ){
        $this->checkUser($email);
        $SQL = "SELECT email FROM admin WHERE email = ? AND password = MD5(?)";
        $data = array($email, $password);
        $statement = $this->makeStatement( $SQL, $data );
        if ( $statement->rowCount() === 1 ) {
            $out = true;
        } else {
            $loginProblem = new Exception( "login failed!" );
            throw $loginProblem;
        }
        return $out;
    }

    private function checkUser ($email) {
        $SQL = "SELECT email FROM admin WHERE email = ?";
        $data = array( $email );
        $this->makeStatement( $SQL, $data );
        $statement = $this->makeStatement( $SQL, $data );
        //if a user with that e-mail is found in database
        if ( $statement->rowCount() < 1 ) {
            //throw an exception > do NOT create new admin user
            $e = new Exception("Error: '$email' Does not Exist as User. Please get an account!");
            throw $e;
        }
    }

    

    public function confirmCredentials ( $email, $password ){
        $SQL = "SELECT email FROM admin WHERE email = ? AND password = MD5(?)";
        $data = array($email, $password);
        $statement = $this->makeStatement( $SQL, $data );
        return $statement;
    }

    public function totalUsers() {
        $SQL = "SELECT COUNT(*) FROM admin";
        $statement = $this->makeStatement($SQL);
        $row = $statement->fetch();
        return $row[0];
    }

    public function getUser( $email ) {
        $SQL = "SELECT admin_id, email, name, password, date_created FROM admin WHERE email = ?";
        $data = array( $email );
        $statement = $this->makeStatement($SQL, $data);
        //$model = $statement->fetchObject();
        return $statement;    
    }

    public function getAllUsers () {
        $SQL = "SELECT admin_id, email, name, password, date_created FROM admin ORDER BY date_created DESC";
        $statement = $this->makeStatement( $SQL );
        return $statement;
    }

    public function getAllUsersWithoutUser ( $email ) {
        $SQL = "SELECT admin_id, email, name, password, date_created FROM admin WHERE email != ? ORDER BY date_created DESC";
        $data = array( $email );
        $statement = $this->makeStatement( $SQL, $data );
        return $statement;
    }

    public function getUsers() {
        $SQL = "SELECT * FROM admin";
        //$data = array( $email );
        $statement = $this->makeStatement($SQL);
        //$model = $statement->fetchObject();
        return $statement;    
    }
}