<?php
class Qaliq
{
    private $number;

    function __construct($num)
    {
        $this->number = $num;
    }

    public function find()
    {
        try {
            $lastDigit = $this->number % 10;
            $firstDigit = floor($this->number / 100) % 10;
            throw new Exception($lastDigit / $firstDigit);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}

$number = new Qaliq(313);
echo gettype($number->find());