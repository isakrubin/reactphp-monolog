[![Test](https://github.com/tajulasri/reactphp-monolog/actions/workflows/test.yml/badge.svg)](https://github.com/tajulasri/reactphp-monolog/actions/workflows/test.yml)

# React PHP File Logger

A PSR non-blocking file logger for react php. Uses monolog and provides non blocking monolog handlers.

## Installing

```php
   
    composer require espressobyte/reactphp-monolog

```

## Usage

Convenient loggers that create a quick monolog logger available as `FileLogger`, `RotatingFileLogger` and `StdIOLogger`.

These loggers are just a quick short-cut to use the non blocking handlers specified below.

#### Monolog/StreamHandler

```php
use Monolog\Logger;
use React\Stream\WritableResourceStream;
use EspressoByte\LoopUtil\FileLogger\Monolog\StreamHandler;

$logger = new Logger('name');
$loop = \React\EventLoop\Factory::create();
$logger->pushHandler(new StreamHandler(new WritableResourceStream(STDOUT, $loop)));
$logger->info('Message!!!');
$loop->run();
```

#### Monolog/StdIOHandler

```php
use Monolog\Logger;
use EspressoByte\LoopUtil\FileLogger\Monolog\StdIOHandler;

$logger = new Logger('name');
$loop = \React\EventLoop\Factory::create();
$logger->pushHandler(new StdIOHandler($loop));
$logger->info('Message!!!');
$loop->run();
```

#### Monolog/FileHandler

```php
use Monolog\Logger;
use EspressoByte\LoopUtil\FileLogger\Monolog\FileHandler;

$logger = new Logger('name');
$loop = \React\EventLoop\Factory::create();

$logFile = __DIR__ . '/test.log';
// expect log file like test-1999-12-31.log 
$logger->pushHandler(new FileHandler($loop, $logFile));
$logger->info('Message!!!');
$loop->run();
```

### Testing

```bash

    ./vendor/bin/phpunit

```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.


### Security

If you discover any security related issues, please email mtajulasri@gmail.com instead of using the issue tracker.

## Credits

-   [Tajul Asri](https://github.com/tajulasri)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

