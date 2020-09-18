<?php

// Encapsulates a command inside an object

// Command (what you execute)
interface Command
{
    public function execute();
}

class GeTCompanyCommad implements Command
{
    private $stockSimulator;

    public function __construct($stockSimulator) {
        $this->stockSimulator = $stockSimulator;
    }

    public function execute()
    {
        $this->stockSimulator->getCompany();
    }
}

class UpdatePricesCommad implements Command
{
    private $stockSimulator;

    public function __construct($stockSimulator) {
        $this->stockSimulator = $stockSimulator;
    }

    public function execute()
    {
        $this->stockSimulator->updatePrices();
    }
}

// Receiver
class StockSimulator
{
    public function GeTCompany() {
        echo 'Getting company stock' . PHP_EOL;
     }

    public function updatePrices() {
        echo 'Updating companies stock' . PHP_EOL;
    }
}

// Client
$in = 'UpdatePricesCommad'; //getAction();

// Invoker
$stockSimulator = new StockSimulator();

if (class_exists($in)) {
    $comm = new $in($stockSimulator);
} else {
    throw new Exception('...');
}

$comm->execute();