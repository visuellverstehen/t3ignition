<?php

declare(strict_types=1);

namespace VV\T3ignition\Error;

use Spatie\Ignition\Ignition;
use TYPO3\CMS\Core\Error\DebugExceptionHandler as CoreExceptionHandler;
use VV\T3ignition\Middleware\AddEnvironmentInformation;
use VV\T3ignition\Middleware\AddNotifierName;

class DebugExceptionHandler extends CoreExceptionHandler
{
    public function echoExceptionWeb(\Throwable $exception)
    {
        Ignition::make()
            ->registerMiddleware([
                AddNotifierName::class,
                AddEnvironmentInformation::class,
            ])
            ->handleException($exception);
    }
}
