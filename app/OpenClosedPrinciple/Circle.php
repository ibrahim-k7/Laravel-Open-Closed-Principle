<?php

namespace App\OpenClosedPrinciple;

class Circle implements ShapeInterface{
    public $radius;

    public function __construct($radius)
    {
        $this->radius = $radius;
    }

    public function area()
    {
        return $this->radius * $this->radius * pi(); 
    }
}