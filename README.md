# t3ignition

t3ignition is a TYPO3 extension that provides a better error debugging experience with the use of [Ignition](https://github.com/spatie/ignition). It is basically a wrapper to easily use Ignition in TYPO3.

## Setup

The setup process is easy, but not flawless. First require the extension via Composer.

```
composer require visuellverstehen/t3ignition --dev
```

Then you have to manually register the `DebugExceptionHandler` in your `AdditionalConfiguration.php` file like so:

```php
$GLOBALS['TYPO3_CONF_VARS']['SYS']['debugExceptionHandler'] = \VV\T3ignition\Error\DebugExceptionHandler::class;
```
