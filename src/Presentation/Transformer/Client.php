<?php

namespace Byteland\Presentation\Transformer;

use Byteland\Domain\Entity\Client as ClientEntity;
use Byteland\Presentation\View\Client as ClientView;

class Client
{
    public function transform(ClientEntity $client)
    {
        return new ClientView($client);
    }

    public function transformList(array $clientList)
    {
        return array_map(function($client){
            return self::transform($client);
        }, $clientList);
    }
}