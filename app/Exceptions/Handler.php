<?php

namespace App\Exceptions;

use Illuminate\Http\Request;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Throwable;

class Handler extends ExceptionHandler
{
    public function render($request, Throwable $exception)
    {
        if ($this->isHttpException($exception)) {
            $code = $exception->getStatusCode();

            if ($request->is('admin/*')) {
                if (view()->exists("errors.{$code}-admin")) {
                    return response()->view("error.{$code}-admin", [], $code);
                }
            }
        }

        return parent::render($request, $exception);
    }
}