<?php
// interface Eat
// {
//     public function eat();
// }
// interface Fly
// {
//     public function fly();
// }
// interface Sleep
// {
//     public function sleep();
// }

// class Bird implements Fly, Eat, Sleep
// {
//     public function fly()
//     {
//         echo "Birds fly";
//     }
//     public function sleep()
//     {

//     }
//     public function eat()
//     {
//         // code...
//     }
// }

// $class = new Bird();
// $class->eat();
interface Animal
{
    public function Run();

}

class Person2 implements Animal
{
    public function Run()
    {
        return "Men insanam";
    }
    public function salam()
    {
        // code...
        echo "salam";
    }
}
class Bird
{
    public function introduce(Animal $animal)
    {
        return $animal->Run();
    }
}
$class = new Bird();
echo $class->introduce(new Person2);

// $a = new Person2();
// $a->salam();