<?php

namespace Unleash\Client\Bundle\Event;

use JetBrains\PhpStorm\ExpectedValues;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

final class BeforeExceptionThrownForAttributeEvent
{
    private ?Throwable $exception = null;
    private int $errorCode;

    public function __construct(
        #[\JetBrains\PhpStorm\ExpectedValues([\Symfony\Component\HttpFoundation\Response::HTTP_NOT_FOUND, \Symfony\Component\HttpFoundation\Response::HTTP_FORBIDDEN, \Symfony\Component\HttpFoundation\Response::HTTP_BAD_REQUEST, \Symfony\Component\HttpFoundation\Response::HTTP_UNAUTHORIZED])]
        int $errorCode
    )
    {
        $this->errorCode = $errorCode;
    }

    public function getException(): ?Throwable
    {
        return $this->exception;
    }

    public function setException(?Throwable $exception): self
    {
        $this->exception = $exception;

        return $this;
    }

    #[ExpectedValues([
        Response::HTTP_NOT_FOUND,
        Response::HTTP_FORBIDDEN,
        Response::HTTP_BAD_REQUEST,
        Response::HTTP_UNAUTHORIZED,
    ])]
    public function getErrorCode(): int
    {
        return $this->errorCode;
    }
}
