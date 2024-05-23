<?php
//! instanceof bir obyektin hansisa calssdan torediyini gosterir. 
class Person
{
    protected string $name;
    protected string $surname;
    protected $age;
    function __construct($name, $surname, $age)
    {
        $this->name = $name;
        $this->age = $age;
        $this->surname = $surname;
    }
    public function toString()
    {
        $result = "Person " . $this->name . " " . $this->surname . " " . $this->age;
        return $result;
    }
}
class Teacher extends Person
{
    protected $subject;
    protected $salary;
    function __construct($name, $surname, $age, $subject, $salary)
    {
        parent::__construct($name, $surname, $age);
        $this->subject = $subject;
        $this->salary = $salary;
    }
    public function toStringTeacher()
    {
        $result = "Teacher " . $this->name . " " . $this->surname . " " . $this->age . " " . $this->subject . " " . $this->salary;
        return $result;
    }
    public function getSubject()
    {
        return $this->subject;
    }

}
class LisfOfPeople
{
    private $people = [];
    public function add(Person $person)
    {
        $this->people[] = $person;
    }
    public function size()
    {
        return count($this->people);
    }
    public function toString()
    {
        $result = '';
        foreach ($this->people as $index => $person) {
            $result .= $person->toString();
        }
        return $result;
    }
    public function getTeachers()
    {
        $teachers = [];
        foreach ($this->people as $item) {
            if ($item instanceof Teacher) {
                $teachers[] = $item;
            }
        }
        return $teachers;
    }
    public function numberOfTeachers()
    {
        $teachers = [];
        foreach ($this->people as $item) {
            if ($item instanceof Teacher) {
                $teachers[] = $item;
            }
        }
        return count($teachers);
    }
    public function getTeachersSubject($subject)
    {
        $teachers = [];
        $result = '';
        foreach ($this->people as $item) {
            if ($item instanceof Teacher && $item->getSubject() == $subject) {
                $result = $item->toStringTeacher();
                $teachers[] = $result;
            }
        }
        return $teachers;
    }
    public function numberOfTeachersSubject($subject)
    {
        return count($this->getTeachersSubject($subject));
    }

}
$teacher = new Teacher("Nihad", 18, "Karimov", "INfo", 200);
$teacher2 = new Teacher("Nihad2", 182, "Karimov", "Math", 230);
$teacher3 = new Teacher("Ramil", 22, "Samil", "Math", 330);
$person = new Person("Nihad", 18, "Karimov");
$person2 = new Person("Fuad", 18, "Karimov");
$list = new LisfOfPeople();
$add = $list->add($person);
$add = $list->add($person2);
$add = $list->add($teacher);
$add = $list->add($teacher2);
$add = $list->add($teacher3);
// echo $list->toString();
print_r($list->numberOfTeachersSubject("Math"));
// print_r($list->numberOfTeachers());
// $printTeacher = $list->getTeachers($teacher);
// echo $printTeacher;
// echo $list->toString();