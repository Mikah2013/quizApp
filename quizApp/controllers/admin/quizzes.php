<?php
//complete source code for controllers/quizzes.php

include_once "models/Quiz_Table.class.php";
include_once "models/User_Table.class.php";

if ( $user ) {
   $email = $_SESSION['email'];
}

$author_email = $email;
$quizTable = new Quiz_Table($db);

$isQuizClicked = isset( $_GET['id']);
if ( $isQuizClicked ) {
    $quizId = $_GET['id'];
    
    $quizData = $quizTable->getQuiz( $quizId );
    
    $quizzesOutput = include_once "views/admin/quiz-html.php";

    $quizzesOutput .= include_once "controllers/admin/question-editor.php";

} else {

    $quizCount = $quizTable->totalQuizzes( $author_email );

    $quizzes = $quizTable->getAllQuizzes( $author_email );
    $quizzesOutput = include_once "views/admin/list-quizzes-html.php";
}

$formIsSubmitted = isset( $_POST['action'] );
if ( $formIsSubmitted ) {
    $buttonClicked = $_POST['action'];
    $deleteQuiz = ( $buttonClicked === 'Delete' );
    
   $id = $_POST['id'];

    if ( $deleteQuiz ) {

        $quizTable->deleteQuiz( $id );

        header('location: admin.php?page=quizzes');
    }

}

return $quizzesOutput;