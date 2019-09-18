<?php
//complete code for views/admin/list-quizzes-html.php

$quizzesFound = isset( $quizzes );
if ( $quizzesFound === false || isset( $quizCount ) === false ) {
trigger_error( ' views/admin/list-quizzes-html.php needs $quizzes and $quizCount' );
}

$number = 1;
$quizzesHTML = "<p>You have $quizCount submitted to the Quiz Database. You are signed in as $email </p>";
$quizzesHTML .= "<table>
                  <tr>
                    <th></th>
                    <th></th>
                    <th colspan='3'></th>
                  </tr>";

while ( $quiz = $quizzes->fetchObject() ) {
$href = "admin.php?page=quizzes&amp;id=$quiz->quiz_id";

$href2 = "admin.php?page=quiz-editor&amp;id=$quiz->quiz_id";


  $quizzesHTML .="<tr>
                    <td>$number</td>
                    <td>$quiz->quiz_name</td>
                    <td><a class='questionlink' href='$href'>Add Questions</a>
                    <td><a class='editlink' href='$href2'>Edit </a></td>
                    <td><form action='admin.php?page=quizzes' method='post'>
                          <input type='hidden' name='id' value='$quiz->quiz_id'>
                          <input class='deletelink' type='submit' name='action' value='Delete'>
                        </form></td>
                  </tr>";
                
$number++;
}

$quizzesHTML .= "</table>";
return $quizzesHTML;

