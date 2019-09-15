<?php

namespace WeTyper\Foundation\Exception;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        WeTyperException::class
    ];

    /**
     * @inheritDoc
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Convert the exception to a WeTyper exception.
     *
     * @param \Exception $e
     * @return \WeTyper\Foundation\Exception\HttpException
     */
    protected function convertException(Exception $e)
    {
        if ($e instanceof HttpException) {
            //
        } elseif ($e instanceof WeTyperException) {
            $e = HttpException::convertWeTyperException($e);
        } elseif ($e instanceof ValidationException) {
            $e = HttpException::convertValidationException($e);
        } elseif ($e instanceof HttpExceptionInterface || $e instanceof HttpResponseException) {
            $e = HttpException::convertHttpException($e);
        } else {
            $e = HttpException::convertException($e);
        }

        return $e;
    }

    /**
     * @inheritDoc
     */
    protected function prepareResponse($request, Exception $e)
    {
        if (config('app.debug')) {
            return $this->toIlluminateResponse(
                SymfonyResponse::create(
                    $this->renderExceptionContent($e),
                    Response::HTTP_INTERNAL_SERVER_ERROR
                ), $e
            );
        }

        $e = $this->convertException($e);

        return $this->toIlluminateResponse(
            $this->renderWeTyperHttpException($e), $e
        );
    }

    /**
     * Render the given HttpException.
     *
     * @param \WeTyper\Foundation\Exception\HttpException $e
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function renderWeTyperHttpException(HttpException $e)
    {
        $this->registerErrorViewPaths();

        if (view()->exists($view = "errors::{$e->getStatusCode()}")) {
            return response()->view($view, ['exception' => $e], $e->getStatusCode());
        }

        return $this->convertExceptionToResponse($e);
    }

    /**
     * @inheritDoc
     */
    protected function prepareJsonResponse($request, Exception $e)
    {
        $encodingOptions = JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES;

        $e = $this->convertException($e);

        $response = $e->getData();
        $response = is_array($response) ? $response : ['data' => $response];

        $response['error'] = $e->getCode();
        $response['message'] = $e->getMessage();

        if (config('app.debug')) {
            $encodingOptions |= JSON_PRETTY_PRINT;

            $response['exception'] = get_class($e);
            $response['file'] = $e->getFile();
            $response['line'] = $e->getLine();
            $response['trace'] = $e->getTrace();
        }

        return new JsonResponse($response, $e->getStatusCode(), [], $encodingOptions);
    }

    /**
     * @inheritDoc
     */
    public function renderForConsole($output, Exception $e)
    {
        if ($e instanceof ValidationException) {
            $e = new WeTyperException(
                $e->validator->errors()->first() ?? $e->getMessage(),
                $e->getCode(), $e
            );
        }

        parent::renderForConsole($output, $e);
    }
}
