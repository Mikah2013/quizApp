<?php
//complete code listing for models/Score_Table.class.php

include_once "models/Table.class.php";

class Result_Table extends Table {

    public function saveScore( $score, $question_number, $quizId, $quizName, $email ) {
        $SQL = "INSERT INTO result ( score, question_number, quiz_id, quiz_name, user_email ) VALUES ( ?,?,?,?,? )";
        $formData = array( $score, $question_number, $quizId, $quizName, $email );
        $entryStatement = $this->makeStatement( $SQL, $formData );
    }

    public function getScoresByEmail ( $email ) {
        $SQL = "SELECT score_id, score, question_number, quiz_id, quiz_name, user_email, date_created FROM result WHERE user_email = ? ORDER BY score";
        $data = array( $email );
        $statement = $this->makeStatement($SQL, $data);
        return $statement;
    }

    public function updateScore ( $score, $question_number, $quizId, $email ) {
        $SQL = "UPDATE result SET score = ?, question_number = ? WHERE quiz_id = ? AND user_email = ?";
        $data = array( $score, $question_number, $quizId, $email );
        $statement = $this->makeStatement( $SQL, $data) ;
        return $statement;
    }

    public function checkScoreByQuizIdAndEmail ( $quizId, $email ) {
        $SQL = "SELECT score_id, score, question_number, quiz_id, quiz_name, user_email FROM result WHERE quiz_id = ? AND user_email = ?";
        $data = array( $quizId, $email  );
        $this->makeStatement( $SQL, $data );
        $statement = $this->makeStatement( $SQL, $data );
        return $statement;
    }
}