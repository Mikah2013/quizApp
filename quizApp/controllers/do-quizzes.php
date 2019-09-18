<?php
//complete code for controllers/do-quizzes.php

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

    $quizzesOutput .= include_once "controllers/user-list-questions.php";

} else {

    $quizCount = $quizTable->AllQuizzes();
    $quizzes = $quizTable->getQuizzes();
    $quizzesOutput = include_once "views/user-list-quizzes-html.php";

}

return $quizzesOutput;