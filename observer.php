<?php

// Allow update all objectcs at the same time whenever some event happens

interface ObserverInterface
{
    public function add(Company $subject);
    // public function remove($subject);
    public function notify($price);
}

class StockSimulatorObserver implements ObserverInterface
{
    private $companies;

    public function __construct() {
        $this->companies = [];
    }
    
    public function add(Company $subject)
    {
        array_push($this->companies, $subject);
    }

    public function updatePrices()
    {
        // calculates new price
        $price = rand(23.99, 199.42);
        $this->notify($price);
    }

    public function notify($price)
    {
        foreach ($this->companies as $company) {
            $company->update($price + rand(5, 50));
        }
    }
}

interface Company
{
    // public function buy();
    // public function sell();
    public function update($price);
}

class Google implements Company
{
    private $price;

    public function __construct($price)
    {
        $this->price = $price;
        echo "Creating " . self::class . " at {$this->price}" . PHP_EOL;
    }

    public function update($price)
    {
        $this->price = $price;
        echo self::class . " selling for {$this->price}" . PHP_EOL;
    }
}

class Wallmart implements Company
{
    private $price;

    public function __construct($price)
    {
        $this->price = $price;
        echo "Creating " . self::class . " at {$this->price}" . PHP_EOL;
    }

    public function update($price)
    {
        $this->price = $price;
        echo self::class . " selling for {$this->price}" . PHP_EOL;
    }
}

// Client

$stockSimulatorObserver = new StockSimulatorObserver();

$comp1 = new Google(19.99);
$comp2 = new Wallmart(15.99);
$comp3 = new Google(19.99);
$comp4 = new Wallmart(15.99);

$stockSimulatorObserver->add($comp1);
$stockSimulatorObserver->add($comp2);
$stockSimulatorObserver->add($comp3);
$stockSimulatorObserver->add($comp4);
$stockSimulatorObserver->updatePrices();
