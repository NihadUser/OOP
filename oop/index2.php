<?php
class Fruit
{
    private $place;
    public $name;
    public $price;
    function __construct($place, $name, $price)
    {
        $this->$place = $place;
        $this->$name = $name;
        $this->price = $price;
    }
    public function message()
    {
        return "Fruit grows at {$this->place},furiut's name is {$this->name} and {$this->price}";
    }
}
$fruit = new Fruit;
$price = "Agdam";
$name = "Agdam";
$place = "Agdam";
$fruit->__construct($price, $name, $place);
echo $fruit->message();