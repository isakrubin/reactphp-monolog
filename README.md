[![tests](https://github.com/tajulasri/reactphp-monolog/actions/workflows/tests.yml/badge.svg)](https://github.com/tajulasri/reactphp-monolog/actions/workflows/tests.yml)
[![Latest Stable Version](http://poser.pugx.org/espressobyte/reactphp-monolog/v)](https://packagist.org/packages/espressobyte/reactphp-monolog)
[![Total Downloads](http://poser.pugx.org/espressobyte/reactphp-monolog/downloads)](https://packagist.org/packages/espressobyte/reactphp-monolog)
[![Latest Unstable Version](http://poser.pugx.org/espressobyte/reactphp-monolog/v/unstable)](https://packagist.org/packages/espressobyte/reactphp-monolog)
[![License](http://poser.pugx.org/espressobyte/reactphp-monolog/license)](https://packagist.org/packages/espressobyte/reactphp-monolog)
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
<?php

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
<?php

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
<?php

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

