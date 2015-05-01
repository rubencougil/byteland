<?php

namespace Byteland\Domain\Usecase\Client;

use Byteland\Domain\Repository\Client;

class ListClient
{
    private $clientRepo;

    public function __construct(Client $clientRepo)
    {
        $this->clientRepo = $clientRepo;
    }

    public function handle()
    {
        return $this->clientRepo->all();
    }
}