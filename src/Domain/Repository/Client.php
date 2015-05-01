<?php

namespace Byteland\Domain\Repository;

use \Byteland\Domain\Entity\Client as ClientEntity;

interface Client
{
    public function get($name);

    public function add(ClientEntity $client);

    public function all();

    public function delete($name);
}