<?php

namespace App\Exceptions;

use Valkyrja\Support\Exception\Classes\ExceptionHandler as ValkyrjaExceptionHandler;

/**
 * Class ExceptionHandler.
 */
class ExceptionHandler extends ValkyrjaExceptionHandler
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
}
