<?php
//complete code for views/admin/question-editor-html.php

$quizDataFound = isset( $quizData );

if ( $quizDataFound === false ) {
trigger_error('views/admin/question-editor-html needs an $quizData object');
}

$questionDataFound = isset( $question );

if ( $questionDataFound === false ) {
    $question = new StdClass();
    $question->question_id = 0;
    $question->question_text = "";
    $question->default_answer = "";
}

return "<p>Add Questions below</p>
<form class='inline-form' action='admin.php?page=quizzes&amp;id=$quizId' method='post' id='question-form'>
<input type='hidden' name='quiz-id' value='$quizId' />
<input type='hidden' name='question-id' value='$question->question_id' />
<label for='question'>Question:</label>
<input type='text' name='question_text' value='$question->question_text' required />
<label for='answer'>Answer:</label>
<input type='text' name='question_answer' value='$question->default_answer' required />
<input type='submit' name='action' value='Add'>
</form></main><br><br><br><br><br><br><br>";