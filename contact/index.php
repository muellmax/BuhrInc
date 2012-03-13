<?php $pagetitle="Contact BuhrInc."; ?>
<?php include '../header.htm' ?>

<form action="sent.php" method="post" >
    <input type="hidden" name="recipient" value="forells@onid.orst.edu" />
    <input type="hidden" name="message" value="message" />
    <input type="hidden" name="subject" value="[CNS] note" />
    <input type="hidden" name="redirect" value="../sent.php" />
	
	<!--- instruction section --->
	<fieldset class="fieldsetfloat">
	<legend>Form Instructions</legend>
	<p class="instruct">Please use this form to contact us at Buhrinc. Use this form to ask questions about possible special orders, the status of a current special order, or just to ask questions in general. Please complete all fields marked with an * as they are required fields, and we will need them in order to reply to you. </p>
	</fieldset>
	
	<!-- drop down list for subject -->
	<fieldset class="fieldsetfloat">
		<legend>General <span class="bold" ></span>topic of message.*</legend>
		<select name="topics" id="topics" accesskey="t" tabindex="5" />
			<option>Other</option>
			<option value="question">Question</option>
			<option value="comment">Comment</option>
			<option value="status">Status of Order</option>
			<option value="ordering">Ordering</option>
		</select>
	</fieldset>
	
	<fieldset>
		<legend><span class="bold" ></span>Compose your message here.</legend>
		
		<textarea name="message" id="message" accesskey="m" tabindex="4" rows="12" cols="60"></textarea>
	</fieldset>
	
	<fieldset class="clearfix">
		<p><label for="send">
		<input type="submit" name="send" id="send" accesskey="s" tabindex="5" value="Send Email" /></label></p>
	</fieldset>
	
</form>
<?php include '../footer.htm' ?>