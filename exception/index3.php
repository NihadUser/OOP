<?php
class Divide
{
    private $number;
    function __construct($number)
    {
        $this->number = $number;
    }

    public function divide()
    {
        try {
            $num = $this->number;
            $copyNum = $num;
            while ($copyNum != 0) {
                $lastDigit = $copyNum % 10;
                if ($num % $lastDigit == 0) {
                    throw new Exception('Yes');
                } else {
                    throw new Exception('No');
                }
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}

$digit = new Divide(22453);

echo $digit->divide();