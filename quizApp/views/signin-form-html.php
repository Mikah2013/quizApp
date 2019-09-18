<?php
//complete code for views/signin-form-html.php

if ($loginProblem === false) {

}


return "<p style='color:#ff0000'>$loginProblem</p>
<form class='signin' method='post' action='index.php?page=signin'>
<p>Sign in to find Quizzes.<p>
<label for='email'>Email</label>
<input type='text' id='email-in' name='email'>
<label for='password'>Password</label>
<input type='password' id='password-in' name='password'>
<input type='submit' name='signin' value='Login'>
<p id='editor-message'>$editorSuccessMessage</p>
</form><br>
<div class='separator'>
<p>----------OR----------</p>
</div>";