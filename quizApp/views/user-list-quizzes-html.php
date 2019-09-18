<?php
//complete code for views/user-list-quizzes-html.php

$quizzesFound = isset( $quizzes );
if ( $quizzesFound === false || isset( $quizCount ) === false ) {
trigger_error( ' views/admin/list-quizzes-html.php needs $quizzes and $quizCount' );
}
$number = 1;
$quizzesHTML = "<p>There are $quizCount quiz(zes) in this database. You are signed in as $email </p>";
$quizzesHTML .= "<table class='quizzes'>
                  <tr>
                    <th></th>
                    <th></th>
                    <th colspan='3'></th>
                  </tr>";


while ( $quiz = $quizzes->fetchObject() ) {
$href = "index.php?page=do-quizzes&amp;id=$quiz->quiz_id";

$quizzesHTML .="<tr>
                    <td>$number</td>
                    <td>$quiz->quiz_name</td>
                    <td>$quiz->quiz_description</a>
                    <td><a class='takeQuiz' href='$href'> Take the Quiz</a></td>
                </tr>";
$number++;
}

$quizzesHTML .= "</table>";
return $quizzesHTML;

