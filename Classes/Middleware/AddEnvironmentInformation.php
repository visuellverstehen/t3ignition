<?php

namespace VV\T3ignition\Middleware;

use Closure;
use TYPO3\CMS\Core\Information\Typo3Version;
use Spatie\FlareClient\FlareMiddleware\FlareMiddleware;
use Spatie\FlareClient\Report;

/**
 * @see spatie/laravel-ignition
 */
class AddEnvironmentInformation implements FlareMiddleware
{
    public function handle(Report $report, Closure $next)
    {
        $report->frameworkVersion(new Typo3Version());

        $report->group('env', [
            'TYPO3_version' => (new Typo3Version())->getVersion(),
            // 'laravel_locale' => app()->getLocale(),
            // 'laravel_config_cached' => app()->configurationIsCached(),
            // 'app_debug' => $GLOBALS['TYPO3_CONF_VARS']['FE']['debug'] ?? true,
            'context' => Environment::getContext()->__toString(),
            'php_version' => phpversion(),
        ]);

        return $next($report);
    }
}
