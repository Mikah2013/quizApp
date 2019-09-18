<?php
//complete code listing for models/Question_Table.class.php

include_once "models/Table.class.php";

class Question_Table extends Table {

    public function saveQuestion( $question_text, $default_answer, $quiz_id ) {
        $SQL = "INSERT INTO question ( question_text, default_answer, quiz_id ) VALUES ( ?,?,? )";
        $formData = array( $question_text, $default_answer, $quiz_id );
        $entryStatement = $this->makeStatement( $SQL, $formData );
    }
    
    public function getAllQuestionsById ( $quiz_id ) {
        $SQL = "SELECT question_id, question_text, default_answer FROM question WHERE quiz_id = ? ORDER BY question_id ASC";
        $data = array( $quiz_id );
        $statement = $this->makeStatement($SQL, $data);
        return $statement;
    }
    
     public function getRowCountById ( $quiz_id ) {
        $SQL = "SELECT COUNT(*) FROM question WHERE quiz_id = ? ORDER BY RAND() LIMIT 1";
        $data = array( $quiz_id );
        $statement = $this->makeStatement($SQL, $data);
        $row = $statement->fetch();
        return $row[0];
    }

    public function getQuestionByQuizId ( $quiz_id ) {
        $SQL = "SELECT question_id, question_text, default_answer FROM question WHERE quiz_id = ?";
        $data = array( $quiz_id );
        $statement = $this->makeStatement($SQL, $data);
        return $statement;
    }  



    public function getAQuestionById( $question_id ) {
        $SQL = "SELECT question_id, question_text, default_answer FROM question WHERE question_id = ?";
        $data = array( $question_id );
        $statement = $this->makeStatement( $SQL, $data );
        $model = $statement->fetchObject();
        return $model;
    }

    public function deleteQuestionById ( $question_id ) {
        $SQL = "DELETE FROM question WHERE question_id = ?";
        $data = array( $question_id );
        $statement = $this->makeStatement( $SQL, $data );
    }

    public function updateQuestionById ( $question_text, $default_answer, $question_id ) {
        $SQL = "UPDATE question SET question_text = ?, default_answer = ? WHERE question_id = ?";
        $data = array( $question_text, $default_answer, $question_id );
        $statement = $this->makeStatement( $SQL, $data) ;
        return $statement;
    }

    public function totalQuestions( $quiz_id ) {
        $SQL = "SELECT COUNT(*) FROM question WHERE quiz_id = ?";
        $formData = array( $quiz_id );
        $statement = $this->makeStatement( $SQL, $formData );
        $row = $statement->fetch();
        return $row[0];
    }

}