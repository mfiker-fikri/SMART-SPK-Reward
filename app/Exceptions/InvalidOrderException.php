<?php

namespace App\Exceptions;

use Exception;

use Illuminate\Http\Exceptions\HttpResponseException;

use Symfony\Component\HttpFoundation\Response;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Session\TokenMismatchException;
use TheSeer\Tokenizer\TokenCollectionException;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;
use Illuminate\Validation\ValidationException;


class InvalidOrderException extends Exception
{
    //
    /**
     * Report the exception.
     *
     * @return bool|null
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render the exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $e
     * @return \Illuminate\Http\Response
     * @return \Symfony\Component\HttpFoundation\Response
     * 
     * @throws \Throwable
     */
    public function render($request, Exception $exception)
    {
        if ($this instanceof HttpResponseException) {
            return $this->renderHttpException($exception);
            // if ($exception->getStatusCode() == 404) {
            //     return response()->view('errors.' . '404', [], 404);
            // }
            // if ($exception->getStatusCode() == 500) {
            //     return response()->view('errors.' . '500', [], 500);
            // }
            // if ($exception->getStatusCode() == 401) {
            //     return response()->view('errors.' . '401', [], 401);
            // }
        } else if ($this instanceof ModelNotFoundException) {
            $model = strtolower(class_basename($exception->getModel()));
            return $this->errorResponse("Does not exist any instance of {$model} with the given id", Response::HTTP_NOT_FOUND);
        } else if ($this instanceof AuthorizationException) {
            return $this->errorResponse($exception->getMessage(), Response::HTTP_FORBIDDEN);
        } else if ($this instanceof TokenMismatchException) {
            return $this->errorResponse($exception->getMessage(), Response::HTTP_UNAUTHORIZED);
        } else if ($this instanceof ValidationException) {
            $errors = $e->validator->errors()->getMessages();
            return $this->errorResponse($errors, Response::HTTP_UNPROCESSABLE_ENTITY);
        } else {
            if (config('app.debug'))
                return $this->dataResponse($e->getMessage());
            else {
                return $this->errorResponse('Try later', Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        }
    }

    // public function handleException(Throwable $e)
    // {
    //     if ($e instanceof HttpException) {
    //         $code = $e->getStatusCode();
    //         $defaultMessage = \Symfony\Component\HttpFoundation\Response::$statusTexts[$code];
    //         $message = $e->getMessage() == "" ? $defaultMessage : $e->getMessage();
    //         return $this->errorResponse($message, $code);
    //     } else if ($e instanceof ModelNotFoundException) {
    //         $model = strtolower(class_basename($e->getModel()));
    //         return $this->errorResponse("Does not exist any instance of {$model} with the given id", Response::HTTP_NOT_FOUND);
    //     } else if ($e instanceof AuthorizationException) {
    //         return $this->errorResponse($e->getMessage(), Response::HTTP_FORBIDDEN);
    //     } else if ($e instanceof TokenBlacklistedException) {
    //         return $this->errorResponse($e->getMessage(), Response::HTTP_UNAUTHORIZED);
    //     } else if ($e instanceof AuthenticationException) {
    //         return $this->errorResponse($e->getMessage(), Response::HTTP_UNAUTHORIZED);
    //     } else if ($e instanceof ValidationException) {
    //         $errors = $e->validator->errors()->getMessages();
    //         return $this->errorResponse($errors, Response::HTTP_UNPROCESSABLE_ENTITY);
    //     } else {
    //         if (config('app.debug'))
    //             return $this->dataResponse($e->getMessage());
    //         else {
    //             return $this->errorResponse('Try later', Response::HTTP_INTERNAL_SERVER_ERROR);
    //         }
    //     }
    // }

}
