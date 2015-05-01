<?php

namespace Byteland\Presentation\Controller\Client;

use Symfony\Component\HttpFoundation\Request;
use Byteland\Domain\Usecase\Client\GetClient as GetClientUseCase;
use Byteland\Presentation\Transformer\Client as ClientTransformer;
use Symfony\Component\HttpFoundation\Response;

class GetClient
{
    private $getClientUseCase;
    private $clientTransformer;

    public function __construct(
        GetClientUseCase $getClientUseCase,
        ClientTransformer $clientTransformer
    )
    {
        $this->getClientUseCase = $getClientUseCase;
        $this->clientTransformer = $clientTransformer;
    }

    public function execute(Request $request)
    {
        $client = $this->getClientUseCase->handle(
            $request->get('name')
        );

        return Response::create(
            serialize($this->clientTransformer->transform($client))
        );
    }
}