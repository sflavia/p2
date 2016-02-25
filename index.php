<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">

	<title>P2</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<?php require "logic.php"; ?>
</head>
<body>
	<h1> xkcd Password Generator </h1>

	<p class="password">
		<?php echo $password ?>
	</p><br>

	<div id="options">
		<p class="optionTitle"> set password criteria:</p>

		<form method="GET" action="index.php">
			<p class="optionContent">

				Number of words: <input type="text" name="numWords" maxlength="1" size="1" value=
				<?php echo $_GET["numWords"]?>>
				<br>

				Number of symbols: <input type="text" name="numSymbols" maxlength="1" size="1" value=<?php echo $_GET["numSymbols"] ?>> <br>

				Add a number? <input type="checkbox" name="addNum"<?php	if (isset($_GET["addNum"]))	echo "checked";?> ><br>

				Word-separator:

				  <input type="radio" name="spacer" value="-"<?php if ($_GET["spacer"] == "-")echo "checked";?>>hyphen

				  <input type="radio" name="spacer" value=" "<?php if ($_GET["spacer"] == " ")echo "checked";?>>space

				  <input type="radio" name="spacer" value="camel"<?php if ($_GET["spacer"] == "camel")echo "checked";?>>camelCase<br>


			</p>
				<input type="submit" value="generate"><br>
		</form>
	</div>

		<p>xkcd password is a combination of words that makes it easy to remember but hard to guess
		<a href="http://xkcd.com/936/" target="_blank">(xkcd)</a>:</p>

	<img id="comic" src="http://imgs.xkcd.com/comics/password_strength.png">
</body>
</html>
