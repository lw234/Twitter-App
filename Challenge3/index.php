<?php 
//ini_set('display_errors', 'On');
//error_reporting(E_ALL | E_STRICT);
require_once ('autoloader.php');

/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "64633572-ycVxT6jZJzbTuKvrvULwqy9OTzcNPKupkloVPZBqB",
    'oauth_access_token_secret' => "XclsXhu9guxXpPb7bUeRahTrZNA56Bi06mUnm5Br9kTc6",
    'consumer_key' => "r4TTjzxoLI6bOrx0WyB4AzUqk",
    'consumer_secret' => "h0VUg2P19jpe3np4hu9Yy7gdQ2dBzMud2jRisYcSruNQkqu8jv"
    );
?>

<html lang = "en">
	<head>
		<title>Twitter API</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="index.css">
	</head>
<h1 align="center"> Twitter Records</h1>


<ul id="accordion">
    <li>
        <h2>Statuses Update</h2>
        <div class="content">
           <?php
        	$url="https://api.twitter.com/1.1/statuses/update.json";
			$requestMethod = "POST"; 

		//POST fields required by the URL above. See relevant docs as above 
			$postfields = array(
    
   				 'status' => 'Using TwitterAPI to tweet!!'
   			 );
			$twitter = new\Classes\Twitter\TwitterAPIExchange($settings);
			$string = json_decode($twitter->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest(),$assoc = TRUE);
			\Classes\HTML\DisplayRecord::printPost($string);
        	
           ?> 
        </div>
    </li>
    <li>
        <h2>User Timeline</h2>
        <div class="content">
            <?php
        	$url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
			$requestMethod = "GET"; 
			$getfield = "?screen_name=kunpooka&count=20";
			$twitter = new \Classes\Twitter\TwitterAPIExchange($settings);
			$string = json_decode($twitter->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest(),$assoc = TRUE);
			\Classes\HTML\DisplayRecord::print_user_timeline($string);
           ?>
        </div>
    </li>
    <li>
        <h2>User Home Timeline</h2>
        <div class="content">
            <?php
        	$url= "https://api.twitter.com/1.1/statuses/home_timeline.json";
			$requiresMethod = "GET";
			$getfield = "?screen_name=kunpooka&count=20";
			$strings = json_decode($twitter->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest(),$assoc = TRUE);
			\Classes\HTML\DisplayRecord::print_user_timeline($strings);
        	
           ?> 
        </div>
    </li>
    <li>
        <h2>Follower</h2>
        <div class="content">
        	<?php
            $url = "https://api.twitter.com/1.1/followers/list.json";
			$requestMethod = "GET";
			$getfield = "?screen_name=kunpooka";
			$twitter = new \Classes\Twitter\TwitterAPIExchange($settings);
			$string = json_decode($twitter->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest(),$assoc = TRUE);
			\Classes\HTML\DisplayRecord::printFollowerslist($string);
			?>
        </div>
    </li>
    <li>
        <h2>Friends List</h2>
        <div class="content">
           <?php
            $url= "https://api.twitter.com/1.1/friends/list.json";
			$requestMethod = "GET";
			$getfield = "?screen_name=kunpooka";
			$twitter = new \Classes\Twitter\TwitterAPIExchange($settings);
			$string = json_decode($twitter->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest(),$assoc = TRUE);
			\Classes\HTML\DisplayRecord::printFollowerslist($string);
			?>
        </div>
    </li>
</ul>
</html>
