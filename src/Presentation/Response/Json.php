<?php

namespace Byteland\Presentation\Response;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Json
{
    public function execute(Request $request, Response $response)
    {
        return JsonResponse::create(unserialize($response->getContent()));
    }
}