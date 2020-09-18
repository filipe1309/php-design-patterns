<?php

// Alow to simplify an interface

// Connects to soma DB
class Database
{
    public function getData($id) {
        echo "Getting data from id {$id}" . PHP_EOL;
    }
}

// Generate an HTML template
class Template
{
    public function serve() {
        echo "Serving template" . PHP_EOL;
    }
}

// Logging
class Logger
{
    public function log($msg) {
        echo "Logging message: {$msg}" . PHP_EOL;
    }
}

$id = 23;
$msg = "Serving a page for ID {$id}";

// With Facade

// Create a page and log activity
class PageFacade
{
    public function createAndServe($id, $msg = "")
    {
        $db = new Database();
        $data = $db->getData($id);

        $template = new Template($id, $data);
        $template->serve();

        $logger = new Logger();
        $logger->log($msg);

    }
}

echo 'With Facade' . PHP_EOL;
$page = new PageFacade();
$page->createAndServe($id, $msg);

echo PHP_EOL;
// Without Facade
echo 'Without Facade' . PHP_EOL;
$db = new Database();
$data = $db->getData($id);

$template = new Template($id, $data);
$template->serve();

$logger = new Logger();
$logger->log($msg);

