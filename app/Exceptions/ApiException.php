<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class ApiException extends Exception
{
    public function __construct(string $message = "Error en la api",int $code = Response::HTTP_CONFLICT, ?Throwable $previous = null) 
    {
        parent::__construct($message, $code, $previous);
    }

    public function render(Request $request) {
        return response()->json(['message' => $this->message], $this->code);
    }
}
