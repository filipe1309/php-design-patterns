<?php

// Aloow to select an algorithm at the runtime
// Decouples algorithm where its use

interface SortStrategy
{
    public function sort();
}

class QuickSort implements SortStrategy
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function sort()
    {
        echo 'sort with ' . self::class . PHP_EOL;
    }
}

class MergeSort implements SortStrategy
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function sort()
    {
        echo 'sort with ' . self::class . PHP_EOL;
    }
}

function sortAlg(&$data) {
    // QuickSort
    // < 20 items => MergeSort
    if (count($data) >  20) {
        $tempData = new QuickSort($data);
    } else {
        $tempData = new MergeSort($data);
    }

    $tempData->sort();
}

$data1 = [3, 5, 2, 3, 4, 4, 5 , 6, 35];
$data2 = [3, 5, 2, 3, 4, 4, 5 , 6, 35, 3, 5, 2, 3, 4, 4, 5 , 6, 35, 1, 2, 3];
sortAlg($data1);
sortAlg($data2);
