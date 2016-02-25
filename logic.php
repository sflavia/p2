<?php
  $wordList = Array(); //collection of words storing here
	$password = ""; //storing password
  $specialChars = Array('!', '#', '$', '%', '&', '@', '*', '?', '~', '+');

	//Store all words from file in wordList array
	$file = fopen("words.txt", "r");
	while (($word = fgets($file)) !== false) {
		//Remove whitespace from word and transform to lowercase
		$word = trim($word, "\r\n");
		$wordList[] = strtolower($word);
	}
	fclose($file);

	$spacer = "-"; // hyphen is the default spacer

	//allow user to choose word spacer
	if (isset($_GET["spacer"]))
		$spacer = $_GET["spacer"];

	//Set spacer parameter
	$_GET["spacer"] = $spacer;

	$totalWords = count($wordList); //# of words in wordList

	$wordcount = 4; //default # of words set for PW

	//allow user to choose # of words for password
	if (isset($_GET["numWords"]) && $_GET["numWords"] !== "")
		$numWords = (int)($_GET["numWords"]);

	//Set numWords parameter
	$_GET["numWords"] = (string)$numWords;

	 $maxLength = 999; //default maximum length of password

	//allow user to specify max length for password
//	if (isset($_GET["maxLength"]) && $_GET["maxLength"] !== "")
//		$maxLength = (int)htmlspecialchars($_GET["maxLength"]);

	//Set maxLength parameter
	$_GET["maxLength"] = (string)$maxLength;

	do {
		//Generate random words for password
		for ($i = 0; $i < $numWords; $i++) {
			$randNum = rand(0, $totalWords - 1);

			$wordToAdd = $wordList[$randNum];

			//If camelCase spacer chosen, transform first letter of word to uppercase
			if ($i !== 0 && $spacer == "camel")
				$wordToAdd = ucfirst($wordList[$randNum]);

			$password = $password . $wordToAdd;

			//Add spacer between words, if hyphen or space
			if ($i !== $numWords - 1 && $spacer !== "camel")
				$password = $password . $spacer;

		}
	} while(strlen($password) > $maxLength);

	//Add number to password upon request
	if (isset($_GET["addNum"])) {
		$password = $password . (string)rand(0, 9);
	}

	$numSymbols = 0; //default # of symbols in password

	//allow user to choose # of symbols
	if (isset($_GET["numSymbols"]) && $_GET["numSymbols"] !== "")
		$numSymbols = (int)($_GET["numSymbols"]);

	//Set numSymbols parameter
	$_GET["numSymbols"] = (string)$numSymbols;

	//Generate random symbols for password, upon request
	for ($i = 0; $i < $numSymbols; $i++) {
		$symbol = $specialChars[rand(0, 9)];
		$password = $password . $symbol;
	}
?>
