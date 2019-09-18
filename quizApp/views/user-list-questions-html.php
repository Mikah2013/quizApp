<?php
//complete source code for views/user-list-question-html.php

$questionsFound = isset( $allQuestionsByQuizId );
if ( $questionsFound === false ) {
trigger_error( ' views/user-list-question-html.php needs $listQuestions' );
}

$messageFound = isset( $showMessage );
if ( $messageFound === false ) {
    $showMessage = "";
}

$questionsHTML = "
<ul id='questions'>
        <p class='showMessage'>$showMessage </p>
        <form class='answers' action='index.php?page=do-quizzes&amp;id=$quizId' method='post'>";    

while ( $question = $allQuestionsByQuizId->fetchObject() ) {    
    
    $questionsHTML .= "<input type='hidden' name='question_id' value='$question->question_id' />
          <p>$count.  $question->question_text</p>
          <input type='hidden' name='checked[$question->question_id]' value='$question->default_answer' />          
          <input type='radio'  name='answer[$question->question_id]' value='True' required/> True <br>
          <input type='radio'  name='answer[$question->question_id]' value='False' /> False <br>";
      $count++;
}

$questionsHTML .= "<p><input type='submit' name='action' value='Submit Answers' /></p>
<p class='showMessage'>$showMessage </p>
</form></ul>";

return $questionsHTML;


