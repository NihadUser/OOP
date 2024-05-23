<?php
//Inheritance miras alma bir klasin metodlarini ve ya parametirlerini diger bir classa oturmesidir (childa)
//bu zaman child classin icinde public ve private deyerleri parent classdaki kimi isdifade eded bilerik amma
//protected metod ve ya funkiyalari isdifade edende error cixacaq protected deyerleri ancaq teyun olundugu 
//classin icinde isdifade ede bilerik
// class Person
// {
//     private $name;
//     private $age;
//     private $surname;
//     public function __construct($name, $age, $surname)
//     {
//         $this->name = $name;
//         $this->age = $age;
//         $this->surname = $surname;
//     }
//     public function message()
//     {
//         echo $this->name . " " . $this->surname . " " . $this->age;

//     }
//     protected function show()
//     {
//         echo $this->name . " " . $this->surname . " " . $this->age;
//     }
// }

// class Nihad extends Person
// {
//     private $height;
//     public function __construct($name, $age, $surname, $height)
//     {
//         parent::__construct($name, $age, $surname);
//         $this->height = $height;
//     }
//     public function info()
//     {
//         echo "Name is $this->name ,height is $this->height cm";
//     }

// }

// $person = new Nihad("Nihad", 12, "Karimov", 180);
// $person->info();
// $nihad = new Person("Nihad", 12, "Karimov");
// $nihad->show();
// $x = 3;
// $person = new Person("nihad", 12, "Karimov");
// $person->message();
// class Car{
//     public 
// }