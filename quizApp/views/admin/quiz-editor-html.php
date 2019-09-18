<?php
//complete source code for views/admin/quiz-editor-html.php
// check if data required for editing is available refer to quizzes.php to fetch $quizData

$quizDataFound = isset( $quizData );
if ( $quizDataFound === false ) {
    // default values for an empty editor
    $quizData = new StdClass();
    $quizData->quiz_id = 0;
    $quizData->quiz_name = "";
    $quizData->quiz_description = "";
}

return "<main>
<form class='editor' action='admin.php?page=quiz-editor' method='POST' id='editor'>
<input type='hidden' name='id' value='$quizData->quiz_id'/>
<label for='quiz_name'>Quiz Title:</label>
<input type='text' name='name' value='$quizData->quiz_name' maxlength='150' cols='60' />
<label for='quiz_description'>Description:</label>
<textarea type='text' name='description' rows='5' cols='60' required>$quizData->quiz_description</textarea>
<input type='submit' name='action' value='save'>
</form></main>";