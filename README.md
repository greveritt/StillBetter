StillBetter
===========

A dumb web app based on a dumb internet meme. Takes the name of a random romance film (or film with a love story in it) and places it in the snowclone "Still A Better Love Story Than X"

Requirements
-------------

* A web server with PHP
* A copy of the [TMDb API wrapper from Glamorous](https://github.com/glamorous/TMDb-PHP-API "glamorous/TMDb-PHP-API") placed in the application/libraries directory. Its GitHub page is linked here. Not currently included due to potential license compatibility issues. 
* A copy of [html5shiv](https://code.google.com/p/html5shiv/ "html5shiv") placed in the app's root directory. All you need is the "dist/" directory

Setup
-------

The installation script is forthcoming, for the time being please follow these steps:

* Place TMDb.php in the application/libraries directory of this web app
* Create a file in application/libraries with your TMDb API as its one and only line, and name that file TMDb_API_key.inc.php. Don't have a TMDb API key? Get one [here](https://www.themoviedb.org/account/signup "The Movie Database registration page")
