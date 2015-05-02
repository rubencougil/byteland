<?php

namespace Byteland\Domain\Usecase\Client;

use Byteland\Domain\Exception\ClientException;
use Byteland\Domain\Repository\Client;
use Byteland\Domain\Entity\Client as ClientEntity;

class AddClient
{
    private $clientRepo;

    public function __construct(Client $clientRepo)
    {
        $this->clientRepo = $clientRepo;
    }

    public function handle(ClientEntity $client)
    {
        $this->checkClient($client);

        return $this->clientRepo->add($client);
    }

    public function checkClient(ClientEntity $client)
    {
        if ($this->clientRepo->get($client->name())) {
            throw new ClientException("Client {$client->name()} already exists");
        }
    }
}