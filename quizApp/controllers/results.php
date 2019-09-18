<?php
//complete code for controllers/results.php

include_once "models/Result_Table.class.php";

if ( $user ) {
   $email = $_SESSION['email'];
}

$resultTable = new Result_Table( $db );

$results = $resultTable->getScoresByEmail ( $email );

$rowCount = $results->rowCount();

$resultsOutput = include_once "views/results-html.php";
return $resultsOutput;

