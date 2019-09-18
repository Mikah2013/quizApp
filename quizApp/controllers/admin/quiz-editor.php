<?php
//complete source code for controllers/quiz-editor.php

include_once "models/Quiz_Table.class.php";
include_once "models/User_Table.class.php";

if ( $user ) {
   $email = $_SESSION['email'];
}

$quizTable = new Quiz_Table($db);
$author_email = $email;

$quizEditorSubmitted = isset( $_POST['action'] );
if ( $quizEditorSubmitted ) {
    $buttonClicked = $_POST['action'];
    $saveQuiz = ( $buttonClicked === 'save' );
    $id = $_POST['id'];
    $insertNewQuiz = ( $saveQuiz and $id === '0' );
    $updateQuiz = ( $saveQuiz and $insertNewQuiz === false );
    $name = $_POST['name'];
    $description = $_POST['description'];
    
    if ( $insertNewQuiz ) {
        // Save Quiz
        $quizTable->saveQuiz( $name, $description, $author_email );

    } else if ( $updateQuiz ) {
        // Update Quiz
        $quizTable->updateQuiz( $name, $description, $id );

    }

}

$quizRequested = isset( $_GET['id']);
if ( $quizRequested ) {
    $id = $_GET['id'];
    $quizData = $quizTable->getQuiz( $id );
    $quizData->quiz_id = $id;
}

$quizEditorOutput = include_once "views/admin/quiz-editor-html.php";
return $quizEditorOutput;


