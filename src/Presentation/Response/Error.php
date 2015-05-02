<?php

namespace Byteland\Presentation\Response;

use Symfony\Component\HttpFoundation\JsonResponse;

class Error
{
    public function execute(\Exception $e, $code)
    {
        $error = array( 'ERROR' => $e->getMessage() );
        return  JsonResponse::create($error, $code);
    }
}