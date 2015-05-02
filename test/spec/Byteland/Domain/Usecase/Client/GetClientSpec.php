<?php

namespace spec\Byteland\Domain\Usecase\Client;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GetClientSpec extends ObjectBehavior
{
    function it_is_initializable($clientRepo)
    {
        $clientRepo->beADoubleOf('Byteland\Domain\Repository\Client');
        $this->beConstructedWith($clientRepo);
        $this->shouldHaveType('Byteland\Domain\Usecase\Client\GetClient');
    }
}
