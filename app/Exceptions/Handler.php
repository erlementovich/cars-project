<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Throwable;
use TypeError;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function report(Throwable $e)
    {
        parent::report($e); // TODO: Change the autogenerated stub
    }

    public function render($request, Throwable $e)
    {
        if ($request->wantsJson()) {
            return $this->handleException($request, $e);
        }
        return parent::render($request, $e);
    }

    public function handleException($request, Throwable $exception)
    {
        if ($exception instanceof NotFoundHttpException) {
            return $this->errorResponse('Такой url не найден', 404);
        }

        if ($exception instanceof ModelNotFoundException) {
            return $this->errorResponse('Объект не найден', 404);
        }

        if ($exception instanceof TypeError) {
            return $this->errorResponse('Передан параметр в неправильном формате', 500);
        }

        if ($exception instanceof QueryException) {
            return $this->errorResponse('Не получилось заполнить базу переданными данными', 500);
        }

        if ($exception instanceof UnauthorizedHttpException) {
            return $this->errorResponse('Необходима авторизация для действия', 401);
        }

        if ($exception instanceof ValidationException) {
            return $this->errorResponse($exception->errors(), 422);
        }

        if ($exception instanceof MethodNotAllowedHttpException) {
            return $this->errorResponse($exception->getMessage(), 405);
        }

        if (config('app.debug')) {
            return parent::render($request, $exception);
        }

        return $this->errorResponse('Неизвестная ошибка', 500);
    }

    public function errorResponse($message = null, $code = null)
    {
        return response()->json([
            'success' => false,
            'errors' => $message,
        ], $code);
    }
}
