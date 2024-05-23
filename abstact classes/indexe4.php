<?php

abstract class Arr2
{
    protected array $arr;
    protected $size;
    abstract public function Sum();
    abstract public function Average();
}

class Sequence2 extends Arr2
{
    function __construct($n)
    {
        $this->size = $n;
        $this->arr = [];
    }

    public function Sum()
    {
        $sum = 0;
        foreach ($this->arr as $element) {
            $sum += $element;
        }
        return $sum;
    }
    public function Average()
    {
        return $this->Sum() / $this->size;
    }
}