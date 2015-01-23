<?php


namespace Dardarlt\Bundle\TwitterTaskBundle\Provider;

class TwitterAccountManager
{
    protected $accountTweets;

    public function __construct($accountTweets)
    {
        $this->accountTweets = $accountTweets;
    }

    /**
     * @return mixed
     */
    public function getAccountTweets()
    {
        return $this->accountTweets;
    }
}
