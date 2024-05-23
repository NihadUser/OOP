<?php
class Divide
{
    private $a;
    private $b;

    function __construct($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
    }

    public function divide()
    {
        try {
            if ($this->a % $this->b == 0) {
                throw new Exception('Divisible');
            } else {
                $reminder = $this->a % $this->b;
                $number = $this->a / $this->b;
                $number = round($number);
                return $number . ' ' . $reminder;
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}

$digit = new Divide(12, 5);
echo $digit->divide();