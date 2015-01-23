<?php

namespace Dardarlt\Bundle\TwitterTaskBundle\Provider;

use Abraham\TwitterOAuth\TwitterOAuth;

class TwitterConnection
{
    const OAUTH_CALLBACK = 'oob';

    private $oauthToken;

    private $oauthTokenSecret;

    private $consumerKey;

    private $consumerSecret;

    public function __construct($consumerKey, $consumerSecret)
    {
        $this->consumerKey = $consumerKey;
        $this->consumerSecret = $consumerSecret;
    }

    public function getConnectionWithAccessToken($oauth_token = null, $oauth_token_secret = null)
    {
        $connection = new TwitterOAuth(
            $this->getConsumerKey(),
            $this->getConsumerSecret(),
            $oauth_token,
            $oauth_token_secret
        );
        return $connection;
    }

    /**
     * @return TwitterOAuth
     * @throws \Abraham\TwitterOAuth\TwitterOAuthException
     */
    public function createConnection()
    {
        $connection = $this->getConnectionWithAccessToken();
        $requestData = $connection->oauth('oauth/request_token', array('oauth_callback' => self::OAUTH_CALLBACK));

        if (!empty($requestData)) {
            $this->oauthToken = $requestData['oauth_token'];
            $this->oauthTokenSecret = $requestData['oauth_token_secret'];
            return $connection;
        }

        if ($connection->lastHttpCode() == 200) {
            return $connection;
        } else {
            throw new \RuntimeException('Please check parameters');
        }
    }

    private function getConsumerKey()
    {
        return $this->consumerKey;
    }

    private function getConsumerSecret()
    {
        return $this->consumerSecret;
    }

    public function createAuthorisationUrl()
    {
        return $url = $this->createConnection()->url("oauth/authorize", array("oauth_token" => $this->oauthToken));
    }
}
