<?php
abstract class Arr
{
    protected $arr;
    protected $size;

    abstract function Min();
    abstract function Max();
}

class Sequence extends Arr
{
    function __construct($size, $arr)
    {
        $this->size = $size;
        $this->arr = $arr;
    }

    public function Min(): int
    {
        $min = 120000000000;
        ;
        foreach ($this->arr as $item) {
            if ($min > $item) {
                $min = $item;
            }
        }
        return $min;
    }
    public function Max(): int
    {
        $max = -120000000000;
        ;
        foreach ($this->arr as $item) {
            if ($max < $item) {
                $max = $item;
            }
        }
        return $max;
    }
}

$arr = new Sequence(4, [1, 2, 3, 4]);
echo $arr->Min();
echo $arr->Max();