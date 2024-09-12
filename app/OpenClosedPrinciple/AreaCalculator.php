<?php

namespace App\OpenClosedPrinciple;

class AreaCalculator
{

    public function totalArea(ShapeInterface ...$shapes)
    {
        $area = 0;
        foreach ($shapes as $shapes) {
            $area += $shapes->area();
        }
        return $area;
    }
}
