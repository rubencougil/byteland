<?php

namespace Byteland\Presentation\Controller\Client;

use Symfony\Component\HttpFoundation\Request;
use Byteland\Domain\Usecase\Client\RemoveClient as RemoveClientUseCase;
use Byteland\Presentation\Transformer\Client as ClientTransformer;
use Symfony\Component\HttpFoundation\Response;

class RemoveClient
{
    private $removeClientUseCase;
    private $clientTransformer;

    public function __construct(
        RemoveClientUseCase $removeClientUseCase,
        ClientTransformer $clientTransformer
    )
    {
        $this->removeClientUseCase = $removeClientUseCase;
        $this->clientTransformer = $clientTransformer;
    }

    public function execute(Request $request)
    {
        $clientList = $this->removeClientUseCase->handle(
            $request->get('name')
        );

        return Response::create(
            serialize($this->clientTransformer->transformList($clientList))
        );
    }
}