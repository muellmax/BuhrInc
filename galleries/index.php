<?php
	$pagetitle = "Galleries";

	include '../header.htm';
	include '../connection.php';

	$query = "select * from Art";
	$result = mysql_query ($query);
?>

<p>Check out various artwork here in the gallery. Click on an image to view it in more detail. </p>

<figure id="gallery">
	<ul class="gallery">

<?php
	// Retrieve Art table and display pictures (arts)
	while ($obj = mysql_fetch_object($result)) {
		$info = "Name: " . $obj->Name . "\nAuthor: " . $obj->Author . "\nSize: " . $obj->Size;

		  // for sale; click on the image to purchase
			$info = $info . "\nPrice: $" . $obj->Price;
?>
		<li><a href="view.php?art_id=<?php print($obj->Art_ID);?>"><img src="<?php print($obj->Link);?>" title="<?php echo $info;?>" /></a>
			<ul>
				<li><?php print($obj->Description); ?></li>
			</ul>
		</li>
<?php
		
	} // end of while
?>

	</ul>
	<br style="clear: both;" />
</figure>

<?php include '../footer.htm' ?>
