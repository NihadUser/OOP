<?php
class Divide
{
    private $n;
    private $a;
    private $b;
    function __construct($n, $a, $b)
    {
        $this->a = $a;
        $this->n = $n;
        $this->b = $b;
    }
    public function isDivisible()
    {
        try {
            $word = $this->n % $this->a == 0 && $this->n % $this->b == 0 ? "YES" : "NO";
            throw new Exception($word);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
$digit = new Divide(10, 2, 1);
echo $digit->isDivisible();