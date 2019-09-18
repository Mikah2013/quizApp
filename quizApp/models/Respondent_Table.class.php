<?php
//complete code listing for models/User_Table.class.php

include_once "models/Table.class.php";

class Respondent_Table extends Table {
    
    public function saveRespondent ( $email, $name, $password ) {
        //check if e-mail is available
        $this->checkEmail( $email );
        $SQL = "INSERT INTO respondent ( email, name, password ) VALUES ( ?,?, MD5(?) )";
        $data= array( $email, $name, $password );
        $this->makeStatement( $SQL, $data );
    }

    private function checkEmail ($email) {
        $SQL = "SELECT email FROM respondent WHERE email = ?";
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
        $this->checkRespondent($email);
        $SQL = "SELECT email FROM respondent WHERE email = ? AND password = MD5(?)";
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

    private function checkRespondent ($email) {
        $SQL = "SELECT email FROM respondent WHERE email = ?";
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
        $SQL = "SELECT email FROM respondent WHERE email = ? AND password = MD5(?)";
        $data = array($email, $password);
        $statement = $this->makeStatement( $SQL, $data );
        return $statement;
    }

    public function totalRespondent() {
        $SQL = "SELECT COUNT(*) FROM respondent";
        $statement = $this->makeStatement($SQL);
        $row = $statement->fetch();
        return $row[0];
    }

    public function getRespondent( $email ) {
        $SQL = "SELECT respondent_id, email, name, password, date_created FROM respondent WHERE email = ?";
        $data = array( $email );
        $statement = $this->makeStatement($SQL, $data);
        //$model = $statement->fetchObject();
        return $statement;    
    }

    public function getAllRespondents () {
        $SQL = "SELECT respondent_id, email, name, password, date_created FROM respondent ORDER BY date_created DESC";
        $statement = $this->makeStatement( $SQL );
        return $statement;
    }

    public function getAllUsersWithoutUser ( $email ) {
        $SQL = "SELECT respondent_id, email, name, password, date_created FROM respondent WHERE email != ? ORDER BY date_created DESC";
        $data = array( $email );
        $statement = $this->makeStatement( $SQL, $data );
        return $statement;
    }

    public function getUsers() {
        $SQL = "SELECT * FROM respondent";
        //$data = array( $email );
        $statement = $this->makeStatement($SQL);
        //$model = $statement->fetchObject();
        return $statement;    
    }
}