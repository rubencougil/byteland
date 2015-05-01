<?php

namespace Byteland\Domain\Usecase\Client;

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
        return $this->clientRepo->add($client);
    }
}