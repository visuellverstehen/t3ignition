<?php

namespace VV\T3ignition\Middleware;

use Closure;
use TYPO3\CMS\Core\Core\Environment;
use Spatie\FlareClient\FlareMiddleware\FlareMiddleware;
use Spatie\FlareClient\Report;

/**
 * @see spatie/laravel-ignition
 */
class AddEnvironmentInformation implements FlareMiddleware
{
    public function handle(Report $report, Closure $next)
    {
        $report->frameworkVersion(TYPO3_version);

        $report->group('env', [
            'TYPO3_version' => TYPO3_version,
            // 'laravel_locale' => app()->getLocale(),
            // 'laravel_config_cached' => app()->configurationIsCached(),
            // 'app_debug' => $GLOBALS['TYPO3_CONF_VARS']['FE']['debug'] ?? true,
            'context' => Environment::getContext()->__toString(),
            'php_version' => phpversion(),
        ]);

        return $next($report);
    }
}
