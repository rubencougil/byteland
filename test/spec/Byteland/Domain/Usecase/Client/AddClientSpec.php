<?php

namespace spec\Byteland\Domain\Usecase\Client;

use Byteland\Domain\Entity\Client;
use Byteland\Domain\Repository\Client as ClientRepository;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AddClientSpec extends ObjectBehavior
{
    function let(ClientRepository $clientRepo)
    {
        $clientRepo->beADoubleOf('Byteland\Domain\Repository\Client');
        $this->beConstructedWith($clientRepo);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Byteland\Domain\Usecase\Client\AddClient');
    }

    function it_client_exist_throw_exception($clientRepo)
    {
        $client = new Client('test_client');

        $clientRepo->get($client->name())->willReturn($client);
        $this->shouldThrow('Byteland\Domain\Exception\ClientException')->during('handle', [$client]);
    }
}
