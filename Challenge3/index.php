<?php 
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

//require_once('TwitterAPIExchange.php');

require ('autoloader.php');
spl_autoload_register('Autoloader::loader');


 
/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "64633572-gzdrjADLeG45QCJHxC9JvFLp1RB6RIqV22niTMfXm",
    'oauth_access_token_secret' => "FbmRD5oOXEQ3KfYONorFYb3clVmyXdYzY7sofPY1mqIOk",
    'consumer_key' => "r4TTjzxoLI6bOrx0WyB4AzUqk",
    'consumer_secret' => "h0VUg2P19jpe3np4hu9Yy7gdQ2dBzMud2jRisYcSruNQkqu8jv"
    );
	
$url = "https://api.twitter.com/1.1/statuses/user_timeline.json";

$requestMethod = "GET"; 

if (isset($_GET['user']))  {$user = $_GET['user'];}  else {$user  = "iagdotme";}
if (isset($_GET['count'])) {$user = $_GET['count'];} else {$count = 20;}
$getfield = "?screen_name=$user&count=$count";
$twitter = new Classes\Twitter\TwitterAPIExchange($settings);
$string = json_decode($twitter->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest(),$assoc = TRUE);
//$string =\Classes\html\DisplayRecord::Dtable($string);
//if($string["errors"][0]["message"] != "") {echo "<h3>Sorry, there was a problem.</h3><p>Twitter returned the following error message:</p><p><em>".$string[errors][0]["message"]."</em></p>";exit();}
foreach($string as $items)
    {
        echo "Time and Date of Tweet: ".$items['created_at']."<br />";
        echo "Tweet: ". $items['text']."<br />";
        echo "Tweeted by: ". $items['user']['name']."<br />";
        echo "Screen name: ". $items['user']['screen_name']."<br />";
        echo "Followers: ". $items['user']['followers_count']."<br />";
        echo "Friends: ". $items['user']['friends_count']."<br />";
        echo "Listed: ". $items['user']['listed_count']."<br /><hr />";
    }
?>


