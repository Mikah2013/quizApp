<?php
//complete code for controllers/signout.php

if ( $user ) {
$user->logout();
header("Location: index.php");
}
