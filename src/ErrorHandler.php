<?php

class ErrorHandler
{
    public static function handleException(Throwable $exception) : void
    {
        echo_json_encode([
            "code" => $exception->getCode(),
            "message" => $exception->getMessage(),
            "file" => $exception->getFile(),
            "line" => $exception->getLine()
        ]);
    }
}