<?php 
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

//require_once('TwitterAPIExchange.php');


require 'DisplayRecord.php';
require ('autoloader.php');
spl_autoload_register('Autoloader::loader');


 
/** Set access tokens here - see: https://dev.twitter.com/apps/ **/


$url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
//$url= "https://api.twitter.com/1.1/statuses/home_timeline.json";

$requestMethod = "GET"; 
//if (isset($_GET['user']))  {$user = $_GET['user'];}  else {$user  = "iagdotme";} 
//if (isset($_GET['count'])) {$user = $_GET['count'];} else {$count = 20;}
$getfield = "?screen_name=iagdotme&count=20";

//$url = "https://api.twitter.com/1.1/followers/list.json";
//$requestMethod = "GET"; 
//$getfield = "?screen_name=$user&count=$count";


$twitter = new \Classes\Twitter\TwitterAPIExchange($settings);
$string = json_decode($twitter->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest(),$assoc = TRUE);
$Tuser = DisplayRecord::print_user_timeline($string);

$url= "https://api.twitter.com/1.1/statuses/home_timeline.json";
$requiresMethod = "GET";
$getfield = "?screen_name=iagdotme&count=20";
$string = json_decode($twitter->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest(),$assoc = TRUE);
$UserF = DisplayRecord::print_user_timeline($string);

/**$url="https://api.twitter.com/1.1/followers/ids.json";
$requiresMethod = "GET";
$getfield = "?screen_name=kunpooka&count=20";
$string = json_decode($twitter->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest(),$assoc = TRUE);
$UserF = DisplayRecord::print_home_timeline($string); 
**/

$url="https://api.twitter.com/1.1/statuses/update.json";
$requestMethod = "POST"; 
$getfield = "?screen_name=iagdotme&count=20";
/** POST fields required by the URL above. See relevant docs as above **/
$postfields = array(
    'screen_name' => 'kunpooka', 
    'status' => 'Doing Hw for IS218!!!'
    );
$twitter = new \Classes\Twitter\TwitterAPIExchange($settings);
$string = json_decode($twitter->setPostfields($postfields)->buildOauth($url, $requestMethod)->performRequest(),$assoc = TRUE);
$UserF = DisplayRecord::print_home_timeline($string); 

 
?>


