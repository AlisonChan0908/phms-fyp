<?php

//config.php

//Include Google Client Library for PHP autoload file
require_once '../../vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('719944339176-3noalf2uoj8cjukfcck8u85nfjs0bvj8.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('PhWkzXfLIxn9SPkXyO1Oc9Uw');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('https://phms-fyp.herokuapp.com/dashboard/production/index.php');

//
$google_client->addScope('email');

$google_client->addScope('profile');

//start session on web page
session_start();

?>
