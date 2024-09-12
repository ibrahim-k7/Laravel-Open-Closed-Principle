
---

## Open Closed Principle

The **Open/Closed Principle (OCP)** is one of the Object-Oriented Programming (OOP) principles and it deals with designing code in a way that makes it **open for extension** and **closed for modification**. In other words, classes or objects should be extendable without needing to modify the existing code.

### Example: Calculate the area of ​​a shape

In the following example, we will create a class called `Rectangle` which contains:

```php
namespace App\OpenClosedPrinciple;

class Rectangle {
    public $width;
    public $height;

    public function __construct($width,$height)
    {
        $this->width = $width;
        $this->height = $height;
    }
}
```
And here we create a class called `AreaCalculator` to calculate the area, which contains:

```php
namespace App\OpenClosedPrinciple;

class AreaCalculator
{

    public function totalArea(array $rectangle)
    {
        $area = 0;
        foreach ($rectangle as $rectangle) {
            $area += $rectangle->width * $rectangle->height;
        }

        return $area;
    }
}
```
Here A new instance of AreaCalculator is created and its totalArea() method is called. An array containing a single Rectangle object with a width of 10 and a height of 20 is passed to it. The totalArea() method calculates the total area and returns the result.

```php
use App\OpenClosedPrinciple\AreaCalculator;
use App\OpenClosedPrinciple\Rectangle;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return (new AreaCalculator())->totalArea([
        new Rectangle(10,20),
    ]);
});

```

**The result will be 200**

After some time, a new requirement was added: calculating the area for a circle as well. Modifying the existing code to accommodate this would violate the Open/Closed Principle. The solution is use Open/Closed Principle

### Refactoring to Follow OCP
1. **Create an interface named ShapeInterface**:
   It contains one function called area.

    ```php
    interface ShapeInterface {
     public function area();
    }
   ```

2. **Implement the interface**:
    Implement the interface on the shapes, add the area function, and write its logic..
   ```php
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
   ```

3. **Edit AreaCalculation class**:
    Change the variable name from $rectangle to $shapes And modify the logic, And using the Spread Operator to check if the parameter is an instance of `ShapeInterface`.

   ```php
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
   ```

4. **Create a new shape class**:
    Create a new shape class whose area is to be calculated. Let's assume that it is a circle.

     ```php
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
     ```

5. **web.php**:

     ```php
    Route::get('/', function () {
        return (new AreaCalculator())->totalArea(
            new Rectangle(10,20),
            new Circle(10),
        );
    });
     ```

--- 
