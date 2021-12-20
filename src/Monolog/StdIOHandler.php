<?php

namespace EspressoByte\LoopUtil\FileLogger\Monolog;

use Monolog\Logger;
use React\EventLoop\LoopInterface;
use React\Stream\WritableResourceStream;

class StdIOHandler extends StreamHandler
{

    /**
     * @param LoopInterface   $loop
     * @param $level
     * @param LoggerDEBUGbool $bubble
     */
    public function __construct(LoopInterface $loop, $level = Logger::DEBUG, bool $bubble = true)
    {
        parent::__construct(new WritableResourceStream(STDOUT, $loop), $level, $bubble);
    }
}
