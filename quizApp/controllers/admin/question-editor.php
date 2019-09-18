<?php
//complete code for controllers/admin/question-editor.php

include_once "models/Question_Table.class.php";

$questionTable = new Question_Table( $db );

$newQuestionSubmitted = isset( $_POST['action'] );
if ( $newQuestionSubmitted ) {
    $buttonClicked = $_POST['action'];   

    $add = ( $buttonClicked === 'Add' );
    $question_id = $_POST['question-id'];

    $insertNewQuestion = ( $add and $question_id === '0' );

    $updateQuestion = ( $add and $insertNewQuestion === false );
    $questionText = $_POST['question_text'];
    $defaultAnswer = $_POST['question_answer'];
    $whichQuiz = $quizId;

    if ( $insertNewQuestion ) {      
        
        $questionTable->saveQuestion( $questionText, $defaultAnswer, $whichQuiz );

            
    } elseif ( $updateQuestion ) {

        $questionTable->updateQuestionById( $questionText, $defaultAnswer, $question_id );

    }
    
}

$questionSubmitted = isset( $_POST['submit'] );
if ( $questionSubmitted ) {
    $clickedButton = $_POST['submit'];
    $id = $_POST['id'];
    
    $editQuestion = ( $clickedButton === 'Edit' );
    $deleteQuestion = ( $clickedButton === 'Delete' );
    
    if ( $deleteQuestion ) {

        $questionTable->deleteQuestionById( $id );

    } elseif ( $editQuestion ) {

        $question = $questionTable->getAQuestionById( $id );
        $question->question_id = $id;
        
    }
}

$questions = include_once "views/admin/question-editor-html.php";

$allQuestions = $questionTable->getAllQuestionsById( $quizId );

$questionCount = $questionTable->totalQuestions( $quizId );

$questions .= include_once "views/admin/list-questions-html.php";

return $questions;