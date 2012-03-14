<?php
	session_start();
	$pagetitle = "Login/Logout";
	include '../header.htm';
?>

<form id='RegisterUser' action='RegisterUser.php' method='post' accept-charset='UTF-8'>
	<fieldset>
		<legend>Login</legend>
		<input type='hidden' name='submitted' id='submitted' value='1' />
		<label for='username' >UserName*:</label>
		<input type='text' name='username' id='username' maxlength="50" />
		<label for='password' >Password*:</label>
		<input type='password' name='password' id='password' maxlength="50" />
		<input type='submit' name='Submit' value='Submit' />
	</fieldset>
</form>

<?php
if (isset($_SESSION['user'])) {
	if ($_SESSION['user'] == -1) 
		echo "<p>Please enter a valid username and password</p>";
	else 
		echo "<p>You have successfully logged in.</p>";
}

include '../footer.htm'; 
?>