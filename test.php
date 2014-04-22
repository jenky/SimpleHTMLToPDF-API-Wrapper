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
		<br>
		<form method="POST" action="">
			<input type="hidden" name="function" value="display">
			<label for="url">SimpleHTMLToPDF::display(</label>
			<input type="text" name="url" id="url" placeholder="http://www.simplehtmltopdf.com/" required>
			<label for="orientation">, orientation = </label>
			<select name="orientation" id="orientation">
				<option>Portrait</option>
				<option>Landscape</option>
			</select>
			, margins = array(
			<label for="mtop">Top = </label>
			<input type="number" name="mtop" id="mtop" placeholder="Top" style="width: 3em;" value="10">,
			<label for="mleft">Left = </label>
			<input type="number" name="mleft" id="mleft" placeholder="Left" style="width: 3em;" value="10">,
			<label for="mright">Right = </label>
			<input type="number" name="mright" id="mright" placeholder="Right" style="width: 3em;" value="10">,
			<label for="mbot">Bottom = </label>
			<input type="number" name="mbot" id="mbot" placeholder="Bottom" style="width: 3em;" value="10">));
			<input type="submit" value="Send Request">
		</form>
	</body>
</html>
<?php } ?>
