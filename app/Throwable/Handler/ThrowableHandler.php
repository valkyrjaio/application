<?php

declare(strict_types=1);

namespace App\Throwable\Handler;

use Valkyrja\Throwable\Handler\ThrowableHandler as ValkyrjaExceptionHandler;

/**
 * Class ThrowableHandler.
 */
class ThrowableHandler extends ValkyrjaExceptionHandler
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
