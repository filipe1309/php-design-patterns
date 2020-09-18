<?php

// Allow to add more functionality to an object/class without having to subclass the origial clas 

// Component
interface LoggerInterface
{
    public function log($msg);
}

// Concrete Component
class FileLogger implements LoggerInterface
{
    public function log($msg)
    {
        echo "<p>Logging to a file: {$msg}</p>" . PHP_EOL;
    }
}

// class EmailLogger implements LoggerInterface
// {
//     public function log($msg)
//     {
//         echo "<p>Logging to an email: {$msg}</p>" . PHP_EOL;
//     }
// }

// Decorator
abstract class LoggerDecorator implements LoggerInterface
{
    protected $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function log($msg)
    {
        $this->logger->log($msg);
    }
}

class EmailLogger extends LoggerDecorator
{
    public function log($msg)
    {
        $this->logger->log($msg);
        echo "<p>Logging to an email: {$msg}</p>" . PHP_EOL;
    }
}

class FaxLogger extends LoggerDecorator
{
    public function log($msg)
    {
        $this->logger->log($msg);
        echo "<p>Logging to an fax: {$msg}</p>" . PHP_EOL;
    }
}

class TextMessageLogger extends LoggerDecorator
{
    public function log($msg)
    {
        $this->logger->log($msg);
        echo "<p>Logging to an TesxMessage: {$msg}</p>" . PHP_EOL;
    }
}

$log = new FileLogger();
$log = new TextMessageLogger($log);
$log = new FaxLogger($log);
$log->log("saving file");
