<?php

namespace SuperiorSoft\TwitterApi;
/**
 * Created by PhpStorm.
 * User: anthonygordon
 * Date: 9/14/16
 * Time: 11:19 AM
 */


class SuperiorTwitter {

    private $oauth_access_token;

    private $oauth_access_token_secret;

    private $consumer_key;

    private $consumer_secret;

    /**
     * @param mixed $consumer_key
     */
    public function setConsumerKey($consumer_key)
    {
        $this->consumer_key = $consumer_key;
    }

    /**
     * @return mixed
     */
    public function getConsumerKey()
    {
        return $this->consumer_key;
    }

    /**
     * @param mixed $consumer_secret
     */
    public function setConsumerSecret($consumer_secret)
    {
        $this->consumer_secret = $consumer_secret;
    }

    /**
     * @return mixed
     */
    public function getConsumerSecret()
    {
        return $this->consumer_secret;
    }

    /**
     * @param mixed $oauth_access_token
     */
    public function setOauthAccessToken($oauth_access_token)
    {
        $this->oauth_access_token = $oauth_access_token;
    }

    /**
     * @return mixed
     */
    public function getOauthAccessToken()
    {
        return $this->oauth_access_token;
    }

    /**
     * @param mixed $oauth_access_token_secret
     */
    public function setOauthAccessTokenSecret($oauth_access_token_secret)
    {
        $this->oauth_access_token_secret = $oauth_access_token_secret;
    }

    /**
     * @return mixed
     */
    public function getOauthAccessTokenSecret()
    {
        return $this->oauth_access_token_secret;
    }


    public function getUserFeed($username) {
        /** Set access tokens here - see: https://dev.twitter.com/apps/ **/
        $settings = array(
            'oauth_access_token' => $this->getOauthAccessToken(),
            'oauth_access_token_secret' => $this->getOauthAccessTokenSecret(),
            'consumer_key' => $this->getConsumerKey(),
            'consumer_secret' => $this->getConsumerSecret()
        );
        $url = "https://api.twitter.com/1.1/statuses/user_timeline.json";

        $requestMethod = "GET";
        $twitter = new Library\TwitterAPIExchange($settings);
        $getfield = "?screen_name=$username&count=20";

        $feed = json_decode($twitter->setGetfield($getfield)
            ->buildOauth($url, $requestMethod)
            ->performRequest(),$assoc = TRUE);

        return $feed;
    }
}