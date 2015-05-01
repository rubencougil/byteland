<?php

namespace Byteland\Domain\Usecase\Client;

use Byteland\Domain\Repository\Client;

class RemoveClient
{
    private $clientRepo;

    public function __construct(Client $clientRepo)
    {
        $this->clientRepo = $clientRepo;
    }

    public function handle($name)
    {
        return $this->clientRepo->delete($name);
    }
}