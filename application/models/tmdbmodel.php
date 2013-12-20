<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class TmdbModel extends CI_Model {
	function __construct()
	{
		parent::__construct();
	}
	public function getTitle()
	{
		// Initialize TMDB library and get TMDB object
	 	require_once(APPPATH . 'libraries/TMDb.php');

		// Get the API key from an external, one-line text file
		$keyFile = file(APPPATH . 'libraries/TMDb_API_key.inc.php');
		$apiKey = trim($keyFile[1]);
		// If HTTPS is not being used...
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
		return $title;
	}
}
