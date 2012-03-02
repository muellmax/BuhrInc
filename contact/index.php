<?php $pagetitle="Contact BuhrInc."; ?>
<?php include '../header.htm' ?>

<form action="http://oregonstate.edu/tools/formmail.php" method="post" >
    <input type="hidden" name="recipient" value="muellmax@onid.orst.edu" />
    <input type="hidden" name="required" value="realname, email, phone, message" />
    <input type="hidden" name="subject" value="[CNS] note" />
    <input type="hidden" name="redirect" value="http://people.oregonstate.edu/~muellmax/buhrinc/contact/sent.php" />
	
	<fieldset class="fieldsetfloat">
	<legend>Form Instructions</legend>
	<p class="instruct">Please use this form to contact Lucas, the creator and owner of Buhrinc. Use this form to ask questions about possible special orders, the status of a current special order, or just to ask questions in general. Please complete all fields marked with an * as they are required fields, and we will need them in order to reply to you. </p>
	</fieldset>
	
	<fieldset>
		<legend>Provide contact information here.</legend>
		
		<label for="realname">First and last <span class="bold" >n</span>ame*</label>
		<input name="realname" id="realname" type="text" accesskey="n" tabindex="1" />
		 
		<label for="email"><span class="bold" >e</span>mail address*</label>
		<input name="email" id="email" type="text" accesskey="e" tabindex="2" />
		
		<label for="phone"><span class="bold" >P</span>hone </label>
		<input name="phone" id="phone" type="text" accesskey="p" tabindex="3" />
	</fieldset>
	
	<fieldset class="fieldsetfloat">
		<legend>General <span class="bold" >t</span>opic of message.*</legend>
		<select name="topics" id="topics" accesskey="t" tabindex="5" />
			<option>Other</option>
			<option value="question">Question</option>
			<option value="comment">Comment</option>
			<option value="status">Status of Order</option>
			<option value="ordering">Ordering</option>
		</select>
	</fieldset>
	
	<fieldset>
		<legend>Compose your <span class="bold" >m</span>essage here.*</legend>
		
		<textarea name="message" id="message" accesskey="m" tabindex="4" rows="4" cols="60"></textarea>
	</fieldset>
	
	<fieldset class="clearfix">
		<p><label for="send">Click to
		<input type="submit" name="send" id="send" accesskey="s" tabindex="5" value="send" />contact information</label></p>
	</fieldset>
</form>
<?php include '../footer.htm' ?>