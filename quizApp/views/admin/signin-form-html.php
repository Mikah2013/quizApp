<?php
//complete code for views/admin/signin-form-html.php

if ($loginProblem === false) {
$loginProblem = "";
}


return "<p style='color:#ff0000'>$loginProblem</p>
<form class='signin' method='post' action='admin.php?page=signin'>
<p>Login into your admin account.<p>
<label for='email'>Email:</label>
<input type='text' id='email-in' name='email'>
<label for='password'>Password:</label>
<input type='password' id='password-in' name='password'>
<input type='submit' name='signin' value='Login'>
<p id='editor-message'>$editorSuccessMessage</p>
</form><br>
<div class='separator'>
<p>----------OR----------</p>
</div>";