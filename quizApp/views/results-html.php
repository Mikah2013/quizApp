<?php
//complete code for views/results-html.php

$resultsFound = isset( $results );

if ( $resultsFound === false ) {
trigger_error( 'views/results-html.php needs $results' );
}

$resultsHTML = "<p>You have $rowCount result(s) submitted to the Quiz Database. You are signed in as $email </p>";
$resultsHTML .= "<table class='results'>
                  <tr>
                    <th>Quiz</th>
                    <th>Score</th>
                    <th>Questions</th>
                    <th>Date Taken</th>
                    <th>Action</th>
                  </tr>";



while ( $result = $results->fetchObject() ) {
    //link for printing out
    //$href = "index.php?page=print&amp;id=$result->score_id";

    $resultsHTML .="<tr>
                    <td>$result->quiz_name</td>
                    <td>$result->score %</td>
                    <td>Out of $result->question_number Questions</a>
                    <td>$result->date_created</a>
                   </tr>";  
    
}

$resultsHTML .= "</table>";
return $resultsHTML;