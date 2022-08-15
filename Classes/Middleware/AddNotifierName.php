<?php

namespace VV\T3ignition\Middleware;

use Closure;
use Spatie\FlareClient\FlareMiddleware\FlareMiddleware;
use Spatie\FlareClient\Report;

/**
 * @see spatie/laravel-ignition
 */
class AddNotifierName implements FlareMiddleware
{
    public const NOTIFIER_NAME = 't3ignition';

    public function handle(Report $report, Closure $next)
    {
        $report->notifierName(static::NOTIFIER_NAME);

        return $next($report);
    }
}
