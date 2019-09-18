<?php
//complete code for database/database.php

$dbInfo = "mysql:host=localhost;dbname=my_quiz";
$dbUser = "root";
$dbPassword = "";
$appname = "Quiz Application";
$db = new PDO( $dbInfo, $dbUser, $dbPassword );
$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );