<?php $pagetitle="Galleries"; ?>

<?php
	include '../header.htm';
	include '../connection.php';

	$query = "select * from Art";
	$result = mysql_query ($query);
?>

<p>Check out these galleries. These picture are here until real content is provided by the client. </p>

<figure id="gallery">
	<ul class="gallery">
	<!--
		<li><a href=""><img src="../images/lastcomic.jpg" alt="A picture of Grace, Ava, and I at the Last Comic Standing show" title="&copy; Max Mueller 2010" /></a>
			<ul>
				<li>Ava, Grace and I at the Last Comic Standing show in Eugene, getting our picture taken with the winner Felipe Esparza.</li>
			</ul>
		</li>
		<li><a href=""><img src="../images/maxgrace.jpg" alt="A picture of Grace and I with honest Abe" title="&copy; Max Mueller 2010" /></a>
			<ul>
				<li>A picture of Grace and I, sitting with honest Abe.</li>
			</ul>
		</li>
		<li><a href=""><img src="../images/maxsugar.jpg" alt="My sweet pup and I" title="&copy; Max Mueller 2010" /></a>
			<ul>
				<li>My doggie Sugar and I.</li>
			</ul>
		</li>
	-->

<?php
	// Retrieve Art table and display pictures (arts)
	while ($obj = mysql_fetch_object($result)) {
		$info = "Name: " . $obj->Name . "\nAuthor: " . $obj->Author . "\nSize: " . $obj->Size;

		if ($obj->For_Sale == 0) { // not for sale
?>
		<li><a href=""><img src="<?php print($obj->Link);?>" title="<?php echo $info;?>" /></a>
			<ul>
				<li><?php print($obj->Description);?></li>
			</ul>
		</li>
<?php
		} else { // for sale; click on the image to purchase
			$info = $info . "\nPrice: $" . $obj->Price;
?>
		<li><a href="purchase.php?user_id=&art_id=<?php print($obj->Art_ID);?>"><img src="<?php print($obj->Link);?>" title="<?php echo $info;?>" /></a>
			<ul>
				<li><?php print($obj->Description); print("\n(Click to purchase)");?></li>
			</ul>
		</li>
<?php
		}
	} // end of while
?>

	</ul>
	<br style="clear: both;" />
</figure>

<?php include '../footer.htm' ?>
