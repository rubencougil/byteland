<?php

namespace Byteland\Presentation\View;

use Byteland\Domain\Entity\Client as ClientEntity;

class Client implements \JsonSerializable
{
    private $client;

    public function __construct(ClientEntity $client)
    {
        $this->client = $client;
        return $this;
    }

    public function jsonSerialize()
    {
        return [
            'name' => $this->client->name()
        ];
    }
}