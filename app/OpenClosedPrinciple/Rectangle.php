<?php 

namespace App\OpenClosedPrinciple;

class Rectangle implements ShapeInterface{
    public $width;
    public $height;

    public function __construct($width,$height)
    {
        $this->width = $width;
        $this->height = $height;
    }
    public function area()
    {
        return $this->width * $this->height;
    }
}