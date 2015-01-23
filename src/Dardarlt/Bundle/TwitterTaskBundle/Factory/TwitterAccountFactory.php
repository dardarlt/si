<?php

namespace Dardarlt\Bundle\TwitterTaskBundle\Factory;

use Dardarlt\Bundle\TwitterTaskBundle\Provider\TwitterCallProvider;

class TwitterAccountFactory
{
    protected $twitterCall;

    public function __construct(TwitterCallProvider $twitterCall)
    {
        $this->twitterCall = $twitterCall;
    }

    public function getAccountTweets($user, $count)
    {
        return $this->twitterCall->getUserTweets($user, $count);
    }
}
