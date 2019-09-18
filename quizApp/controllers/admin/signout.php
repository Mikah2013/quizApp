<?php
//complete code for signout.php

if ( $user ) {
$user->logout();
header("Location: admin.php");
}
