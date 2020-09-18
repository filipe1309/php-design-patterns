<?php

// Hide complexity of creting objects, and is easier to tests with mocks

class Position
{

}

interface ShapeInterface
{
    public function draw();
}

class Rectangle implements ShapeInterface
{
    private $position;
    
    public function __construct($pos)
    {
        $this->position = $pos;
    }

    public function draw()
    {
        echo "Drawing a rectangle" . PHP_EOL;
    }
}

class Circle implements ShapeInterface
{
    public function draw()
    {
        echo "Drawing a circle" . PHP_EOL;
    }
}

class MoackShape implements ShapeInterface
{
    public function draw()
    {
        return true;
    }
}

class ShapeFactory
{
    public function create($type)
    {
        switch($type) {
            case "Rectangle": return new Rectangle(new Position());
            case "Circle": return new Circle(new Position());
            case "Mock": return new MoackShape();
        }
    }
}

function drawStuff(ShapeInterface $shape) {
    $shape->draw();
    // Does a bunch of other complex stuff
}

// $shape1 = new Rectangle();
// $shape2 = new Circle();
// drawStuff($shape1);
// drawStuff($shape2);
// $shape = new MoackShape();
// drawStuff($shape);

$factory = new ShapeFactory();
$rect = $factory->create('Rectangle');
echo $rect->draw();

$circle = $factory->create('Circle');
echo $circle->draw();

$mock = $factory->create('Mock');
echo $mock->draw();