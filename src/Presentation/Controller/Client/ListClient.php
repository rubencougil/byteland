<?php

namespace Byteland\Presentation\Controller\Client;

use Symfony\Component\HttpFoundation\Request;
use Byteland\Domain\Usecase\Client\ListCLient as ListClientUseCase;
use Byteland\Presentation\Transformer\Client as ClientTransformer;
use Symfony\Component\HttpFoundation\Response;

class ListClient
{
    private $listClientUseCase;
    private $clientTransformer;

    public function __construct(
        ListClientUseCase $listClientUseCase,
        ClientTransformer $clientTransformer
    )
    {
        $this->listClientUseCase = $listClientUseCase;
        $this->clientTransformer = $clientTransformer;
    }

    public function execute(Request $request)
    {
        $clientList = $this->listClientUseCase->handle(
            $request->get('name')
        );

        return Response::create(
            serialize($this->clientTransformer->transformList($clientList))
        );
    }
}
