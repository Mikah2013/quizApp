<?php
//complete code listing for models/Quiz_Table.class.php

include_once "models/Table.class.php";

class Quiz_Table  extends Table {

    public function saveQuiz( $name, $description, $admin_email ) {
        $SQL = "INSERT INTO quiz ( quiz_name, quiz_description, admin_email ) VALUES ( ?,?,? )";
        $formData = array( $name, $description, $admin_email );
        $entryStatement = $this->makeStatement( $SQL, $formData );
    }

    public function getAllQuizzes( $admin_email ) {
        $SQL = "SELECT quiz_id, quiz_name, quiz_description, date_created FROM quiz WHERE admin_email = ?";
        $data = array( $admin_email );
        $statement = $this->makeStatement( $SQL , $data );
        return $statement;
    }

    public function getQuizzes() {
        $SQL = "SELECT quiz_id, quiz_name, quiz_description, date_created FROM quiz";
        $statement = $this->makeStatement( $SQL );
        return $statement;
    }

    public function getQuiz( $quiz_id ) {
        $SQL = "SELECT quiz_id, quiz_name, quiz_description, date_created FROM quiz WHERE quiz_id = ?";
        $data = array( $quiz_id );
        $statement = $this->makeStatement( $SQL, $data );
        $model = $statement->fetchObject();
        return $model;
    }

    public function deleteQuiz ( $id ) {
        $SQL = "DELETE FROM quiz WHERE quiz_id = ?";
        $data = array( $id );
        $statement = $this->makeStatement( $SQL, $data );
    }

    public function updateQuiz (  $name, $description, $id  ) {
        $SQL = "UPDATE quiz SET quiz_name = ?, quiz_description = ? WHERE quiz_id = ?";
        $data = array(  $name, $description, $id );
        $statement = $this->makeStatement( $SQL, $data );
        return $statement;
    }

    public function totalQuizzes( $admin_email ) {
        $SQL = "SELECT COUNT(*) FROM quiz WHERE admin_email = ?";
        $formData = array( $admin_email );
        $statement = $this->makeStatement( $SQL, $formData );
        $row = $statement->fetch();
        return $row[0];
    }

    public function AllQuizzes() {
        $SQL = "SELECT COUNT(*) FROM quiz";
        $statement = $this->makeStatement( $SQL );
        $row = $statement->fetch();
        return $row[0];
    }


}
