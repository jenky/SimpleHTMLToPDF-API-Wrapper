<?php
/*
 * This is just a test page for the API Wrapper.
 */
if(isset($_POST['url']) || isset($_POST['function'])) {
	include("simplehtmltopdf-api.php");

	$api = new SimpleHTMLToPDF();

	if($_POST['function'] == "display") {
		$api->display(urldecode($_POST['url']),
			$_POST['orientation'],
			array(
				$_POST['mtop'],
				$_POST['mleft'],
				$_POST['mright'],
				$_POST['mbot'],
		));
	}


	$api->display(urldecode($_POST["url"]));
} else {
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Test page for Simple HTML to PDF Wrapper</title>
	</head>
	<body>
		<form method="POST" action="">
			<label for="url">Get this page : </label>
			<input type="text" name="url" id="url">
			<input type="submit" value="Go !">
		</form>

		<form method="POST" action="">
			<input type="hidden" name="function" value="display">
			<label for="url">SimpleHTMLToPDF::display(</label>
			<input type="text" name="url" id="url">
			<label for="orientation">, orientation = </label>
			<select name="orientation" id="orientation">
				<option>Portrait</option>
				<option>Landscape</option>
			</select>
			<label for="margins">, margins = array(</label>
			<input type="number" name="mtop" placeholder="Top" id="margins" value="10">,
			<input type="number" name="mleft" placeholder="Left" value="10">,
			<input type="number" name="mright" placeholder="Right" value="10">,
			<input type="number" name="mbot" placeholder="Bottom" value="10">));
			<input type="submit" value="Send Request">
		</form>
	</body>
</html>
<?php } ?>
