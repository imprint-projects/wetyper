<?php

namespace WeTyper\Foundation\Exception;

use Exception;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class HttpException extends WeTyperException
{
    /**
     * The response status.
     *
     * @var int
     */
    protected $statusCode = Response::HTTP_BAD_REQUEST;

    /**
     * The extra data in the response.
     *
     * @var mixed
     */
    protected $data;

    /**
     * Get the response status.
     *
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * Set the response status.
     *
     * @param int $statusCode
     * @return $this
     */
    public function setStatusCode($statusCode): self
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * Get the extra data.
     *
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set the extra data to be responded.
     *
     * @param mixed $data
     * @return $this
     */
    public function setData($data): self
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Convert a validation exception to HTTP exception.
     *
     * @param \Illuminate\Validation\ValidationException $e
     * @return static
     */
    public static function convertValidationException(ValidationException $e): self
    {
        $errors = $e->validator->errors();

        return (new static($errors->first() ?: $e->getMessage(), $e->status, $e))
            ->setStatusCode($e->status)
            ->setData(['errors' => $errors->messages()]);
    }

    /**
     * Convert a HTTP exception.
     *
     * @param \Exception $e
     * @return static
     */
    public static function convertHttpException(Exception $e): self
    {
        if ($e instanceof HttpExceptionInterface) {
            $statusCode = $e->getStatusCode();
            $content = $e->getMessage();
        } elseif ($e instanceof HttpResponseException) {
            $response = $e->getResponse();
            $statusCode = $response->getStatusCode();
            $content = $response->getContent();
        } else {
            $statusCode = Response::HTTP_INTERNAL_SERVER_ERROR;
            $content = $e->getMessage();
        }

        $message = isset(Response::$statusTexts[$statusCode])
            ? Response::$statusTexts[$statusCode]
            : Response::$statusTexts[Response::HTTP_INTERNAL_SERVER_ERROR];

        return (new static($message, $statusCode, $e))
            ->setStatusCode($statusCode)
            ->setData($content);
    }

    /**
     * Convert a WeTyper exception to HTTP exception.
     *
     * @param \WeTyper\Foundation\Exception\WeTyperException $e
     * @return static
     */
    public static function convertWeTyperException(WeTyperException $e): self
    {
        return new static($e->getMessage(), $e->getCode() ?: 1000, $e);
    }

    /**
     * Convert an unknown exception to HTTP exception.
     *
     * @param \Exception $e
     * @return static
     */
    public static function convertException(Exception $e): self
    {
        $message = config('app.debug')
            ? '!! DEBUG !! ' . $e->getMessage()
            : Response::$statusTexts[Response::HTTP_INTERNAL_SERVER_ERROR];

        return (new static($message, Response::HTTP_INTERNAL_SERVER_ERROR, $e))
            ->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
