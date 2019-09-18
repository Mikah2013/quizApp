<?php
//complete code for views/admin/signup-form-html.php

if( isset($authorFormMessage) === false ) {
$authorFormMessage = "";
}

return "
<form class='signin' action='admin.php?page=signup' method='post' id='signup-editor'>
<p>Register below if you have no admin account<p>
<label for='email'>Email</label>
<input name='email' id='email' type='text' required>
<label for='name'>Names</label>
<input name='name' id='name' type='text' required>
<label for='password'>Password</label>
<input name='password' id='password' type='password' required>
<input type='submit' id='button' name='new-author' value='Register Account'>
<p id='signup-form-message'>$authorFormMessage</p>
</form>
</div>
";