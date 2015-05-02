<?php

namespace spec\Byteland\Domain\Entity;

use Byteland\Domain\Entity\Client;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ClientSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $client = new Client('test_client');
        $this->beConstructedWith($client);
        $this->shouldHaveType('Byteland\Domain\Entity\Client');
    }
}
