<?php
class Shape
{
    private $shapeName;
    function __construct($name)
    {
        $this->shapeName = $name;
    }
    public function getShapeName()
    {
        return $this->shapeName;
    }
    public function toString()
    {
        echo $this->getShapeName();
    }
}
class Circle extends Shape
{
    function __construct()
    {
        parent::__construct("Circle");
    }
}
class Rectangle extends Shape
{
    function __construct()
    {
        parent::__construct("Rectangle");
    }
}
class Triangle extends Shape
{
    function __construct()
    {
        parent::__construct("Triangle");
    }
}