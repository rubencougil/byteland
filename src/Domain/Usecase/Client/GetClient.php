<?php

namespace Byteland\Domain\Usecase\Client;

use Byteland\Domain\Repository\Client;

class GetClient
{
    private $clientRepo;

    public function __construct(Client $clientRepo)
    {
        $this->clientRepo = $clientRepo;
    }

    public function handle($name)
    {
        return $this->clientRepo->get($name);
    }
}