<?php
abstract class Shape2
{
    protected $a;
    protected $b;
    function __construct($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
    }
    abstract function getPerimeter();
    abstract function Area();
}

class Rectangle extends Shape2
{

    function __construct($a, $b)
    {
        parent::__construct($a, $b);
    }
    public function getPerimeter()
    {
        return ($this->a + $this->b) * 2;
    }
    public function Area()
    {
        return $this->a * $this->b;
    }
}
class Square extends Rectangle
{
    function __construct($a)
    {
        parent::__construct($a, $a);
    }
    public function Area()
    {
        return $this->a * $this->a;
    }
}
class Triangle extends Shape2
{
    private $c;
    function __construct($a, $b, $c)
    {
        parent::__construct($a, $b);
        $this->c = $c;
    }
    public function getPerimeter()
    {
        return $this->a + $this->b + $this->c;
    }
    public function Area()
    {
        $s = ($this->a + $this->b + $this->c) / 2.0;
        return sqrt($s * ($s - $this->a) * ($s - $this->b) * ($s - $this->c));
    }
}
$rectangle = new Square(3);
echo $rectangle->getPerimeter();
echo $rectangle->Area();