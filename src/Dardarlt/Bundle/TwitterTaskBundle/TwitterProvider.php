<?php


namespace Dardarlt\Bundle\TwitterTaskBundle;


use Abraham\TwitterOAuth\TwitterOAuth;

class TwitterProvider
{
    public function createConnection()
    {
        $accessToken = '334589081-IIDzC7wteEuBJ5KwkeggzIrgGwWjM0C5INaDLCV';
        $accessTokenSecret = 'JPKuxqQssjVUwCNhWFfQ4tBCHp1VSK2ZSMYoTKVEUTrSF';

        $connection = new TwitterOAuth(
            'Sn5U3VGTT3Fs7Wyuvhpxdq5ox',
            '2B05fJjc5nO1eWjd8OksIlVJjp0XUwqqhhcGeEtLJIkzh9Uvz6',
            $accessToken,
            $accessTokenSecret
        );
        return $connection->get("account/verify_credentials");
    }

    public function getConnectionWithAccessToken($oauth_token, $oauth_token_secret) {
        $connection = new TwitterOAuth('Sn5U3VGTT3Fs7Wyuvhpxdq5ox', '2B05fJjc5nO1eWjd8OksIlVJjp0XUwqqhhcGeEtLJIkzh9Uvz6', $oauth_token, $oauth_token_secret);
        return $connection;
    }

    public function getStatuses()
    {
        $connection = $this->getConnectionWithAccessToken("334589081-IIDzC7wteEuBJ5KwkeggzIrgGwWjM0C5INaDLCV", "JPKuxqQssjVUwCNhWFfQ4tBCHp1VSK2ZSMYoTKVEUTrSF");
        return $connection->get("statuses/home_timeline");
    }
}
