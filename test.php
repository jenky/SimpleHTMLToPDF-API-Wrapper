<?php
/*
 * This is just a test page for the API Wrapper.
 */
if(isset($_POST['url'])) {
	include("simplehtmltopdf-api.php");

	$api = new SimpleHTMLToPDF();

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
	</body>
</html>
<?php } ?>
