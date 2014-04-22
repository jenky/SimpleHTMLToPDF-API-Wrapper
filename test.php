<?php
/*
 * This is just a test page for the API Wrapper.
 */
if(isset($_POST['url']) || isset($_POST['function'])) {
	include("simplehtmltopdf-api.php");

	$api = new SimpleHTMLToPDF();

	switch ($_POST['function']) {
		case 'display':
			$api->display(
				urldecode($_POST['url']),
				$_POST['orientation'],
				array(
					$_POST['mtop'],
					$_POST['mleft'],
					$_POST['mright'],
					$_POST['mbot'],
			));
			break;

		case 'download':
			$api->download(
				urldecode($_POST['url']),
				$_POST['orientation'],
				array(
					$_POST['mtop'],
					$_POST['mleft'],
					$_POST['mright'],
					$_POST['mbot'],
			));
			break;

		default:
			$api->display(urldecode($_POST["url"]));
			break;
	}


} else {
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Test page for Simple HTML to PDF Wrapper</title>
		<style>
			.code {
				font-family: monospace;
				margin: 0;
				padding: 0;
			}

			.string   { color: #0F0; }
			.function { color: #0FF; }
			.var      { color: #BBB; }
			.class    { color: #0F0; }
		</style>
	</head>
	<body>
		<!--<form method="POST" action="">
			<label for="url">Get this page : </label>
			<input type="text" name="url" id="url">
			<input type="submit" value="Go !">
		</form>-->
		<h1>SimpleHTMLToPDF API Wrapper test page</h1>
		<p>
			This page help you understand how to use this API Wrapper.<br>
			Each form show you how to use each function and what parameters you should pass to these.<br>
			Play with it and be sure to check the GitHub repository : <a href="https://github.com/AMDG2/SimpleHTMLToPDF-API-Wrapper">https://github.com/AMDG2/SimpleHTMLToPDF-API-Wrapper</a>
		</p>
		<form method="POST" action="">
			<fieldset><legend>The display function</legend>
				<input type="hidden" name="function" value="display">
				<span class="function">include</span>(<span class="string">"simplehtmltopdf-api.php"</span>);<br>
				<span class="var">$api</span> = <span class="function">new</span> <span class="class">SimpleHTMLToPDF</span>();
				<div class="code">
					<label for="url"><span class="var">$api</span>-><span class="function">display</span>(</label>
					<input type="text" name="url" id="url" placeholder="http://www.simplehtmltopdf.com/" required style="width: 15em;">
					<label for="orientation">, orientation = </label>
					<select name="orientation" id="orientation">
						<option>Portrait</option>
						<option>Landscape</option>
					</select>
					, margins = <span class="function">array</span>(
					<label for="mtop">Top = </label>
					<input type="number" name="mtop" id="mtop" placeholder="Top" style="width: 3em;" value="10">,
					<label for="mleft">Left = </label>
					<input type="number" name="mleft" id="mleft" placeholder="Left" style="width: 3em;" value="10">,
					<label for="mright">Right = </label>
					<input type="number" name="mright" id="mright" placeholder="Right" style="width: 3em;" value="10">,
					<label for="mbot">Bottom = </label>
					<input type="number" name="mbot" id="mbot" placeholder="Bottom" style="width: 3em;" value="10">));
					<input type="submit" value="Send Request">
				</div>
			</fieldset>
		</form>
		<form method="POST" action="">
			<fieldset><legend>The download function</legend>
				<input type="hidden" name="function" value="download">
				<pre style="margin: 0; padding: 0;">include("simplehtmltopdf-api.php");
$api = new SimpleHTMLToPDF();</pre>
				<div class="code">
					<label for="url"><span class="var">$api</span>-><span class="function">download</span>(</label>
					<input type="text" name="url" id="url" placeholder="http://www.simplehtmltopdf.com/" required style="width: 15em;">
					<label for="orientation">, orientation = </label>
					<select name="orientation" id="orientation">
						<option>Portrait</option>
						<option>Landscape</option>
					</select>
					, margins = <span class="function">array</span>(
					<label for="mtop">Top = </label>
					<input type="number" name="mtop" id="mtop" placeholder="Top" style="width: 3em;" value="10">,
					<label for="mleft">Left = </label>
					<input type="number" name="mleft" id="mleft" placeholder="Left" style="width: 3em;" value="10">,
					<label for="mright">Right = </label>
					<input type="number" name="mright" id="mright" placeholder="Right" style="width: 3em;" value="10">,
					<label for="mbot">Bottom = </label>
					<input type="number" name="mbot" id="mbot" placeholder="Bottom" style="width: 3em;" value="10">));
					<input type="submit" value="Send Request">
				</div>
			</fieldset>
		</form>
	</body>
</html>
<?php } ?>
