<?php

namespace Byteland\Presentation\Controller\Client;

use Byteland\Domain\Entity\Client;
use Symfony\Component\HttpFoundation\Request;
use Byteland\Domain\Usecase\Client\AddClient as AddClientUseCase;
use Byteland\Presentation\Transformer\Client as ClientTransformer;
use Symfony\Component\HttpFoundation\Response;

class AddClient
{
    private $addClientUseCase;
    private $clientTransformer;

    public function __construct(
        AddClientUseCase $addClientUseCase,
        ClientTransformer $clientTransformer
    )
    {
        $this->addClientUseCase = $addClientUseCase;
        $this->clientTransformer = $clientTransformer;
    }

    public function execute(Request $request)
    {
        $client = $this->addClientUseCase->handle(
            new Client($request->get('name'))
        );

        return Response::create(
            serialize($this->clientTransformer->transform($client))
        );
    }
}