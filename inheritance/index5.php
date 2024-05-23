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
    public function getAge()
    {
        return $this->age;
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
    public function getOldestTeacher()
    {
        $maxAge = -10000;
        $result = '';
        foreach ($this->people as $person) {
            if ($person instanceof Teacher && $person->getAge() > $maxAge) {
                $maxAge = $person->getAge();
                $result = $person->toStringTeacher();
            }
        }
        return $result;
    }
    public function getOldestTeacherSubject($subject)
    {
        $maxAge = -10000;
        $result = '';
        foreach ($this->people as $person) {
            if ($person instanceof Teacher && $person->getAge() > $maxAge && $person->getSubject() == $subject) {
                $maxAge = $person->getAge();
                $result = $person->toStringTeacher();
            }
        }
        return $result;
    }
    public function getYoungetTeacher()
    {
        $result = '';
        $min = 3212321;
        foreach ($this->people as $item) {
            if ($item instanceof Teacher && $min > $item->getAge()) {
                $min = $item->getAge();
                $result = $item->toStringTeacher();
            }

        }
        return $result;
    }

}
$person = new Person("Nihad", 18, "Karimov");
$person2 = new Person("Fuad", 18, "Karimov");
$teacher1 = new Teacher("Nihad", 'Karimov', 18, "Info", 200);
$teacher2 = new Teacher("Sahmar", 'Quluzade', 22, "Info", 500);
$teacher3 = new Teacher("Gismat", 'Gusein', 23, "LL", 500);
$list = new LisfOfPeople();
$add = $list->add($person);
$add = $list->add($person2);
$add = $list->add($teacher1);
$add = $list->add($teacher2);
$add = $list->add($teacher3);
print_r($list->getYoungetTeacher());