<!DOCTYPE html>
<html>
<head>
	<title>Still A Better Love Story Than X</title>
	<link rel="stylesheet" media="screen" href="default.css" type="text/css"/>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width">
	<!--[if lt IE 9]>
	<script src="dist/html5shiv.js"></script>
	<![endif]-->
</head>
<body>
	<?php
	// Initialize TMDB library and get TMDB object
	require('TMDb.php');
	
	// If HTTPS is not being used...
	$apiKey = 'YOUR_API_KEY';
	if (empty($_SERVER['HTTPS'])) {
		$tmdb = new TMDb($apiKey);
	}
	else {
		$tmdb = new TMDb($apiKey, 'en', FALSE, TMDb::API_SCHEME_SSL);
	}

	// Gets basic information on the Romance genre, such as number of pages. Also acquires contents of first page
	$genreID = 10749;
	$romanceDump = $tmdb->getMoviesByGenre($genreID);

	// Now we get vital information like the maximum number of pages, and which title to use (from the chosen page)
	$pageNum = rand(1, $romanceDump["total_pages"]);
	$movieNum = rand(1, count($romanceDump["results"])) - 1;

	$pageContents = $tmdb->getMoviesByGenre($genreID, $pageNum);

	$title = $pageContents["results"][$movieNum]["title"];
	print("<p>
	<h1>Still a better love story than <span id=\"title\">$title</span></h1>
	</p>
	<p id=\"reload\">
	<a href=\"\">Another?</a>
	</p>");

	?>
</body>
</html>
