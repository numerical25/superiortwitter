<?php

include 'SuperiorSoft/TwitterApi/SuperiorTwitter.php';
include 'SuperiorSoft/TwitterApi/Library/TwitterAPIExchange.php';

$superTwitter = new SuperiorSoft\TwitterApi\SuperiorTwitter();
$superTwitter->setConsumerKey("CONSUMER_KEY");
$superTwitter->setConsumerSecret("CONSUMER_SECRET");
$superTwitter->setOauthAccessToken("OAUTH_ACCESS_TOKEN");
$superTwitter->setOauthAccessTokenSecret("OAUTH_ACCESS_TOKEN_SECRET");

var_dump($superTwitter->getUserFeed('USERNAME'));