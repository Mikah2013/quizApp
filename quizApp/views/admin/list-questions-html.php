<?php
//complete code for views/admin/list-questions-html.php

$questionsFound = isset( $allQuestions );
if( $questionsFound === false || $questionCount === false ){
trigger_error('views/admin/list-questions-html.php needs $allQuestions and $questionCount' );
}
$number = 1;
$allQuestionsHTML = "<p>You have $questionCount questions added to this Quiz</p>
                     <table class='questions'>
                       <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                       </tr>";

while ($questionData = $allQuestions->fetchObject() ) {
    $href = "admin.php?page=quizzes&amp;id=$quizId";

$allQuestionsHTML .= "<tr>
                       <td>$number</td>
                       <td>$questionData->question_text</td>
                       <td>$questionData->default_answer</a>
                       <td><form action='admin.php?page=quizzes&amp;id=$quizId' method='post'>
                             <input type='hidden' name='id' value='$questionData->question_id'/>
                             <input type='submit' name='submit' value='Edit'/>
                             <input type='submit' name='submit' value='Delete'/>
                           </form>
                        </td>
                      </tr>";
$number++;
}

$allQuestionsHTML .= "</table>";
return $allQuestionsHTML;