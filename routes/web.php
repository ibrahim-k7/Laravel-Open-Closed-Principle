<?php

use App\OpenClosedPrinciple\AreaCalculator;
use App\OpenClosedPrinciple\Circle;
use App\OpenClosedPrinciple\Rectangle;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return (new AreaCalculator())->totalArea(
        new Rectangle(10,20),
        new Circle(10),
    );
});
