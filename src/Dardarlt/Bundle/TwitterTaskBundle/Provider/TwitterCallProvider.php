<?php

namespace Dardarlt\Bundle\TwitterTaskBundle\Provider;

class TwitterCallProvider
{

    protected $twitterConnection;

    public function __construct(TwitterConnection $twitterConnection)
    {
        $this->twitterConnection = $twitterConnection;
    }

    public function getUserTweets($user, $count = 10)
    {
        return $this->twitterConnection
            ->createConnection()
            ->get("statuses/user_timeline", array("screen_name" => $user, "count" => $count));
    }
}
