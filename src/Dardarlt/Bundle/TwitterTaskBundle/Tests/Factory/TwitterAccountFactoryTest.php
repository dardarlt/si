<?php

namespace Dardarlt\Bundle\TwitterTaskBundle\Tests\Factory;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TwitterAccountFactoryTest extends WebTestCase
{
    public function testReturnsUserTweets()
    {
        $expectedOutput = array('tweets');

        $twitterMock = $this->getTwitterConnectionMock();
        $twitterMock
            ->expects($this->atLeastOnce())
            ->method('getUserTweets')
            ->willReturn($expectedOutput);

        $twitterAccountFactory = new \Dardarlt\Bundle\TwitterTaskBundle\Factory\TwitterAccountFactory($twitterMock);
        $twitterAccountFactory->getAccountTweets('test', 5);
        $this->assertEquals($expectedOutput, $twitterAccountFactory->getAccountTweets('test', 5));
    }

    private function getTwitterConnectionMock()
    {
        return $this
            ->getMockBuilder('\Dardarlt\Bundle\TwitterTaskBundle\Provider\TwitterCallProvider')
            ->disableOriginalConstructor()
            ->getMock();
    }
}
