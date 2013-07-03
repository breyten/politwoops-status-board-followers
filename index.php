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
//$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, '260405786-7dd6mKfPdWiXPqczc3k3qYtFrJGHqC8Mo2HyJYp6', 'mWPfNcKCUSq6i6XVScqWg22OFN8h3PzfK8LxIRL6Y');
//$connection->host = "https://api.twitter.com/1.1/";

/* If method is set change API call made. Test is called by default. */
//$content = $connection->get('account/verify_credentials');

/* Some example calls */
//$content = $connection->get('users/show', array('screen_name' => 'abraham'));
//$connection->post('statuses/update', array('status' => date(DATE_RFC822)));
//$connection->post('statuses/destroy', array('id' => 5437877770));
//$connection->post('friendships/create', array('id' => 9436992));
//$connection->post('friendships/destroy', array('id' => 9436992));

//$results = $connection->get('lists/members', array('owner_screen_name' => 'breyten', 'slug' => 'politwoops'));

//$content = '';
//foreach($results->users as $user) {
//	$content .= "<div class=\"counter\">";
//  $content .= "<h2>". $user->name ."</h2>";
//  $content .= $user->followers_count;  
//  $content .= "</div>";
//}

//var_dump($results);
include('html.inc');
