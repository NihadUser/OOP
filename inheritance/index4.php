<?php
class Rectangle
{
    private $a, $b;
    function __construct($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
    }
    public function area()
    {
        return $this->a * $this->b;
    }
    public function perimeter()
    {
        return 2 * ($this->a + $this->b);
    }
}
class Square extends Rectangle
{
    function __construct($a)
    {
        parent::__construct($a, $a);
    }
}
// $square = new Square(4);
// echo $square->area();
// echo "<br>";
// echo $square->perimeter();
// $rectangle = new Rectangle(3, 4);
// echo $rectangle->area();
// echo "<br>";
// echo $rectangle->perimeter();