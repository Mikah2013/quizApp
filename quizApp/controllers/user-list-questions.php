<?php
//complete source code for controllers/user-list-question.php

include_once "models/Question_Table.class.php";
include_once "models/Result_Table.class.php";
include_once "models/Quiz_Table.class.php";

if ( $user ) {
   $email = $_SESSION['email'];
}

$questionTable = new Question_Table( $db );
$resultTable = new Result_Table( $db );
$quizTable = new Quiz_Table( $db );

$count = 1;
$result = 0;

$allQuestions = $questionTable->getAllQuestionsById( $quizId );

$allQuestionsByQuizId = $questionTable->getQuestionByQuizId( $quizId );

$answerSubmitted = isset( $_POST['action'] );

if ( $answerSubmitted ) {

    if (!empty($_POST['answer'])) {

        $correctAnswer = $_POST['checked'];
        $answer = $_POST['answer'];        
        $number = count($_POST['checked']);
        $checked = array();

         foreach ( $correctAnswer as $key=> $value ) {
             if ( $correctAnswer[$key] === $answer[$key] ) {
                 //echo $key." Index matches<br>";
                 $result++;                 
                 $score = ($result/$number) * 100;
            
             } else {
                 //echo $key." Index does not match<br>";

             }
         }

         $quiz = $quizTable->getQuiz( $quizId );

         $quizName = $quiz->quiz_name;


        if ( $result != 0 ) {

            $checkScore = $resultTable->checkScoreByQuizIdAndEmail( $quizId, $email );

            if ( $checkScore->rowCount() === 1 ) {

                $resultTable->updateScore( $score, $number, $quizId, $quizName, $email );

            } else {

                $resultTable->saveScore( $score, $number, $quizId, $quizName, $email );

            }
            
            header('location: index.php?page=results');


        } else {

            $showMessage = "You Scored $result. Please Try Again";

        }
        
        
        
    } else {

        $showMessage = "You have not submitted any answers";
    }

    
}



$questions = include_once "views/user-list-questions-html.php";

return $questions;
