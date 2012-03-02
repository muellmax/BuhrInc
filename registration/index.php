<?php $pagetitle="Register"; ?>
<?php include '../header.htm' ?>

<p>Please register for an account and have access to everything Buhrinc has to offer.</p>


	<fieldset class="fieldsetfloat">
		<legend>   </legend>
		
		<label for="username">Choose A Username*</label>
		<input for="username" id="username" type="text" accesskey="u" tabindex="5" />
		<span class="example">min of 6 chars</span></p>
		
		<label for="password">Choose A Password*</label>
		<input for="password" id="password" type="text" accesskey="p" tabindex="6" />
		<span class="example">min of 6 chars</span>
		
		<label for="confirm">Confirm Password*</label>
		<input for="confirm" id="username" type="text" accesskey="c" tabindex="7" />
		
	</fieldset>
	
	<fieldset>
		<legend>Please enter registration information.</legend>
		
		<label for="firstname">First Name*</label>
		<input name="firstname" id="firstname" type="text" accesskey="f" tabindex="1" />
		
		<label for="lastname">Last Name*</label>
		<input name="lastname" id="lastname" type="text" accesskey="l" tabindex="2" />
		
		<label for="email">Email*</label>
		<input name="email" id="email" type="text" accesskey="e" tabindex="3" />
		
		<label for="phone">Phone Number</label>
		<input name="phone" id="phone" type="text" accesskey="n" tabindex="4" />
		
	</fieldset>
	
	

<?php include '../footer.htm' ?>