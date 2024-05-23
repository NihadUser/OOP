<?php

// class Student
// {
//     public $name;
//     public $grade;

//     function __construct($name, $grade)
//     {
//         $this->name = $name;
//         $this->grade = $grade;
//     }

//     public function getProperties()
//     {
//         return "name is $this->name grade is $this->grade";
//     }
// }

// $student = new Student("Aqil", 80);

// echo $student->getProperties();

class Bank
{
    public $amount = 1000;
    public function increase($value)
    {
        $this->amount += $value;
    }
    public function decrease($value)
    {
        $this->amount -= $value;
    }
    public function showAmount()
    {
        echo $this->amount . "AZN";
    }
}

$bank = new Bank();
$bank->showAmount();
echo "<br>";
$bank->increase(100);
$bank->showAmount();