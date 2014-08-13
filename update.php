<?php
/**
 * @file
 * User has successfully authenticated with Twitter. Access tokens saved to session and DB.
 */

/* Load required lib files. */
session_start();
require_once('twitteroauth/twitteroauth.php');
require_once('config.php');

/* Create a TwitterOauth object with consumer/user tokens. */
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, '260405786-7dd6mKfPdWiXPqczc3k3qYtFrJGHqC8Mo2HyJYp6', 'mWPfNcKCUSq6i6XVScqWg22OFN8h3PzfK8LxIRL6Y');
$connection->host = "https://api.twitter.com/1.1/";

/* If method is set change API call made. Test is called by default. */
$content = $connection->get('account/verify_credentials');

/* Some example calls */
//$content = $connection->get('users/show', array('screen_name' => 'abraham'));
//$connection->post('statuses/update', array('status' => date(DATE_RFC822)));
//$connection->post('statuses/destroy', array('id' => 5437877770));
//$connection->post('friendships/create', array('id' => 9436992));
//$connection->post('friendships/destroy', array('id' => 9436992));

$results = $connection->get('lists/members', array('owner_screen_name' => 'breyten', 'slug' => 'politwoops'));

$countries_info = json_decode(file_get_contents('http://www.politwoops.nl/countries.json'));

$countries = array();
foreach($countries_info as $country_info) {
  //print_r($country_info);
  $group = $country_info->group;
  if (!empty($group->user_name)) {
    $countries[strtolower($group->user_name)] = array(
      'user_name' => $group->user_name,
      'flag' => $group->flag,
      'followers' => 0
    );
  }
}
$content = '';
foreach($results->users as $user) {
  $countries[strtolower($user->screen_name)]['user_name'] = $user->screen_name;
  $countries[strtolower($user->screen_name)]['followers'] = $user->followers_count;
  $countries[strtolower($user->screen_name)]['user'] = $user;
}

header('Content-type: application/json');
echo json_encode(array_values($countries));

//var_dump($results);
//include('html.inc');
