<?php
//complete source code for views/admin/quiz-html.php

$quizDataFound = isset( $quizData );

if ( $quizDataFound === false ) {
trigger_error('views/admin/quiz-html.php needs an $quizData object');
}

return "<p><b>Title:</b> $quizData->quiz_name<br><b>Description:</b> $quizData->quiz_description<br> <b>Date Created:</b> $quizData->date_created</p>";


