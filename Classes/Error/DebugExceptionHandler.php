<?php

declare(strict_types=1);

namespace VV\T3ignition\Error;

use Spatie\Ignition\Ignition;
use TYPO3\CMS\Core\Error\DebugExceptionHandler as CoreExceptionHandler;

class DebugExceptionHandler extends CoreExceptionHandler
{
    public function echoExceptionWeb(\Throwable $exception)
    {
        Ignition::make()->handleException($exception);
    }
}
