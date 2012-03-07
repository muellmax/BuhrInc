<?php $pagetitle="Register"; ?>
<?php include '../header.htm' ?>

<p>Please register for an account and have access to everything Buhrinc has to offer.</p>
<form id='register' action='register.php' method='post'
	accept-charset='UTF-8'>
	<fieldset>
		<legend>Register</legend>
		<input type='hidden' name='submitted' id='submitted' value='1' />
		<label for='firstname' >Your First Name*: </label>
		<input type='text' name='firstname' id='firstname' maxlength="50" />
		<label for='lastname' >Your Last Name*: </label>
		<input type='text' name='lastname' id='lastname' maxlength="50" />
		<label for='email' >Email Address*:</label>
		<input type='text' name='email' id='email' maxlength="50" />
		<label for='username' >UserName*:</label>
		<input type='text' name='username' id='username' maxlength="50" />
		<label for='password' >Password*:</label>
		<input type='password' name='password' id='password' maxlength="50" />
		<input type='submit' name='Submit' value='Submit' />
	</fieldset>
	
	
	
</form>

<!-- client-side Form Validations:
Uses the excellent form validation script from JavaScript-coder.com-->
<script type='text/javascript'>
// <![CDATA[
    var pwdwidget = new PasswordWidget('thepwddiv','password');
    pwdwidget.MakePWDWidget();
    
    var frmvalidator  = new Validator("register");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();
    frmvalidator.addValidation("firstname","req","Please provide your first name");
	
	frmvalidator.addValidation("lastname","req","Please provide your last name");
	
    frmvalidator.addValidation("email","req","Please provide your email address");

    frmvalidator.addValidation("email","email","Please provide a valid email address");

    frmvalidator.addValidation("username","req","Please provide a username");
    
    frmvalidator.addValidation("password","req","Please provide a password");

// ]]>
</script>
<?php include '../footer.htm' ?>