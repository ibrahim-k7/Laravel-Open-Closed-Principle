<?php 

namespace App\Open_Closed_Principle;

class Rectangle {
    public $width;
    public $height;

    public function __construct($width,$height)
    {
        $this->width = $width;
        $this->height = $height;
    }
}