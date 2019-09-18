<?php
//complete code for admin.php
error_reporting( E_ALL );
ini_set( "display_errors", 1 );

include_once "models/Page_Data.class.php";
include_once "models/User.class.php";
include_once "databases/database.php";

$user = new User();

$pageData = new Page_Data();
$pageData->title = $appname;
$pageData->addCSS("css/quizApp.css");
$pageData->addScript("js/quiz.js");

if ( $user->isLoggedIn() === FALSE) {

     $pageData->content .=include_once "controllers/admin/signin.php";

} else {
    
    $pageData->content = include_once "views/admin/admin-navigation.php";
    
    $navigationIsClicked = isset( $_GET['page'] );
    
    if ( $navigationIsClicked ) {
        
        $contrl = $_GET['page'];
    } else {
        
        $contrl = "quizzes";
    }
    
    $pageData->content .= include_once "controllers/admin/$contrl.php";
}
$page = include_once "views/page.php";
echo $page;