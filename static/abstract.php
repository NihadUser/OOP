<?php

abstract class Animal
{
    abstract public $property = 12;
    abstract public function functionName();
}

abstract class Bird extends Animal
{
    public function functionName()
    {
        return "hello";
    }
}