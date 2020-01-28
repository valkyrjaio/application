<?php

namespace App\Exceptions;

use Throwable;
use Valkyrja\Exceptions\NativeExceptionHandler;
use Valkyrja\Http\Response;

/**
 * Class ExceptionHandler.
 */
class ExceptionHandler extends NativeExceptionHandler
{
    /**
     * Enable debug mode.
     *
     * @param int  $errorReportingLevel [optional] The error reporting level
     * @param bool $displayErrors       [optional] Whether to display errors
     *
     * @return void
     */
    public static function enable(int $errorReportingLevel = E_ALL, bool $displayErrors = false): void
    {
        parent::enable($errorReportingLevel, $displayErrors);
    }

    /**
     * Get a response from a throwable.
     *
     * @param Throwable $exception
     *
     * @return Response
     */
    public function response(Throwable $exception): Response
    {
        return parent::response($exception);
    }
}
