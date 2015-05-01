<?php

namespace Byteland\Infrastructure\Repository\Json;

use Byteland\Domain\Repository\Client as ClientRepository;
use Byteland\Domain\Entity\Client as ClientEntity;

class Client implements ClientRepository
{
    private $clients;
    private $path;

    public function __construct($path)
    {
        $this->path = $path;
        $this->clients = json_decode(file_get_contents($path), true);
    }

    public function get($name)
    {
        return new ClientEntity(
            $this->clients[$name]['name']
        );
    }

    public function add(ClientEntity $client)
    {
        $this->clients[$client->name()] = [
            'name' => $client->name()
        ];

        $this->persist();

        return $this->get($client->name());
    }

    public function all()
    {
        return array_map(function($client){
            return new ClientEntity($client['name']);
        }, $this->clients);
    }

    public function delete($name)
    {
        unset($this->clients[$name]);
        $this->persist();
        return $this->all();
    }

    public function persist()
    {
        file_put_contents($this->path, json_encode($this->clients));
    }
}